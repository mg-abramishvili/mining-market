<template>
  <div class="row">
    <div class="col-12 col-lg-8">
      <div v-for="question in questions" :key="'question_' + question.id" :id="'question_' + question.id">
        <div v-if="active_question == question.id">
          <h5>{{ question.text }}</h5>
          <input v-if="question.custom_input" :name="'result_' + question.id" type="text">
          <ul>
            <li v-for="answer in question.answers" :key="answer.value">
              <button @click="chooseAnswer(question, answer)">{{ answer.value }}</button>
            </li>
          </ul>
          <button @click="prevQuestion()">Назад</button>
          <button @click="nextQuestion()">Далее</button>
        </div>
      </div>
    </div>
    <div class="col-12 col-lg-4">
      <ul>
        <template v-for="resultItem in result">
          <li v-if="resultItem && resultItem.question && resultItem.question.length > 0">
            <strong>{{ resultItem.question }}</strong><br>
            {{ resultItem.answer }}</li>
        </template>
      </ul>
    </div>
  </div>
</template>

<script>
  import axios from 'axios';

  export default {
    data() {
      return {
        questions: [
          {
            id: 1,
            text: 'Вы уже знаете какое оборудование вы хотите?',
            answers: [
              {value: 'Да', next_question: 9},
              {value: 'Нет, хочу определиться!', next_question: 2}
            ],
            custom_input: false,
            default_next_question: null
          },
          {
            id: 2,
            text: 'Имеете ли вы опыт в майнинге?',
            answers: [
              {value: 'Да, есть небольшой опыт', next_question: 103},
              {value: 'Нет, я новичок', next_question: 103}
            ],
            custom_input: false,
            default_next_question: null
          },
          {
            id: 103,
            text: 'Где Вы планируете размещать оборудование?',
            answers: [
              {value: 'В квартире, в жилом помещении или на балконе', next_question: 104},
              {value: 'Есть отдельное помещение под майнинг', next_question: 104},
              {value: 'Еще не определился с размещением', next_question: 104}
            ],
            custom_input: false,
            default_next_question: null
          },
          {
            id: 104,
            text: 'Какой бюджет Вы планируете инвестировать?',
            answers: [],
            custom_input: true,
            default_next_question: 105
          },
          {
            id: 105,
            text: 'Какая у вас стоимость электричества?',
            answers: [
              {value: 'Менее 3 рублей за кВт', next_question: 106},
              {value: '3-6 рублей за кВт', next_question: 106},
              {value: 'Более 6 рублей за кВт', next_question: 106},
              {value: 'Нужна консультация по этому вопросу', next_question: 106}
            ],
            custom_input: false,
            default_next_question: null
          },
          {
            id: 106,
            text: 'Как Вы планируете производить оплату?',
            answers: [
              {value: 'Наличными', next_question: 107},
              {value: 'Переводом на карту', next_question: 107},
              {value: 'Оплата по безналу', next_question: 107},
              {value: 'Наложенный платеж с оплатой при получении', next_question: 7}
            ],
            custom_input: false,
            default_next_question: null
          },
          {
            id: 107,
            text: 'Нужна ли Вам доставка оборудования?',
            answers: [
              {value: 'Да', next_question: 108},
              {value: 'Нет, самовывоз из Уфы', next_question: 108}              
            ],
            custom_input: false,
            default_next_question: null
          },
          {
            id: 108,
            text: 'В какой город нужна доставка?',
            answers: [],
            custom_input: true,
            default_next_question: null
          },
          {
            id: 9,
            text: 'Какое оборудование вы хотите?',
            answers: [
              {value: 'Асики', next_question: 10},
              {value: 'Видеокарты', next_question: 13},
              {value: 'Майнинг-фермы', next_question: 15}
            ],
            custom_input: false,
            default_next_question: null
          },
          {
            id: 10,
            text: 'У вас есть предпочтения по производителю?',
            answers: [
              {value: 'Нет предпочтений', next_question: 11},
              {value: 'Да, хочу выбрать', next_question: 12},
            ],
            custom_input: false,
            default_next_question: null
          },
          {
            id: 11,
            text: 'Что Вам важно при выборе асика?',
            answers: [
              {value: 'Стабильность работы', next_question: 103},
              {value: 'Быстрая окупаемость', next_question: 103},
              {value: 'Самый большой доход', next_question: 103},
            ],
            custom_input: false,
            default_next_question: null
          },
          {
            id: 12,
            text: 'Какой бренд для Вас приоритетнее?',
            answers: [
              {value: 'Bitmain', next_question: 103},
              {value: 'Innosilicon', next_question: 103},
              {value: 'Whatsminer', next_question: 103},
            ],
            custom_input: true,
            default_next_question: null
          },
          {
            id: 13,
            text: 'Какие видеокарты Вы бы хотели?',
            answers: [
              {value: 'AMD', next_question: 14},
              {value: 'NVIDIA', next_question: 14},
            ],
            custom_input: false,
            default_next_question: null
          },
          {
            id: 14,
            text: 'Возможно вы знаете уже модель видеокарты?',
            answers: [],
            custom_input: true,
            default_next_question: 103
          },
          {
            id: 15,
            text: 'На каком уровне Вы знакомы с майнинг-фермами?',
            answers: [
              {value: 'У меня есть сейчас или была майнинг-ферма', next_question: 16},
              {value: 'У меня нет и никогда не было майнинг-фермы', next_question: 16},
            ],
            custom_input: false,
            default_next_question: null
          },
          {
            id: 16,
            text: 'На каких видеокартах вы хотите майнинг-ферму?',
            answers: [
              {value: 'AMD', next_question: 17},
              {value: 'NVIDIA', next_question: 17},
            ],
            custom_input: false,
            default_next_question: null
          },
          {
            id: 17,
            text: 'На скольких видеокартах будет собрана ваша Майнинг-ферма?',
            answers: [
              {value: 'На 4 видеокарты', next_question: 19},
              {value: 'На 6 видеокарты', next_question: 19},
              {value: 'На 8 видеокарты', next_question: 19},
              {value: 'На 12 видеокарты', next_question: 19}
            ],
            custom_input: false,
            default_next_question: null
          },
          {
            id: 19,
            text: 'Какие у вас есть пожелания к сборке Майнинг-фермы?',
            answers: [],
            custom_input: true,
            default_next_question: 103
          },
        ],

        active_question: 1,

        result: [],
      };
    },
    methods: {
      chooseAnswer(question, answer) {
        this.result.push(Object.fromEntries(new Map([ ['id', question.id], ['question', question.text], ['answer', answer.value] ])))
        this.nextQuestion(answer.next_question)
      },
      nextQuestion(next_question) {
        if(next_question && next_question > 0) {
          this.active_question = next_question
        } else {
          var q = this.questions.find(x => x.id === this.active_question)
          if(document.getElementsByName('result_' + q.id)[0].value && document.getElementsByName('result_' + q.id)[0].value.length > 0) {
            this.result.push(Object.fromEntries(new Map([ ['id', q.id], ['question', q.text], ['answer', document.getElementsByName('result_' + q.id)[0].value] ])))
            this.active_question = q.default_next_question
          } else {
            alert('Ошибка')
          }
        }
      },
      prevQuestion() {
        var q = this.questions.find(x => x.id === this.active_question)

        if(this.result && this.result.length > 0) {
          this.active_question = this.result.pop().id
        }
      }
    }
  }
</script>