<template>
  <div class="quiz">
    <div class="row">
      <div class="col-12 col-lg-12">
        <div v-for="question in questions" :key="'question_' + question.id" :id="'question_' + question.id" class="question">
          <div v-if="active_question == question.id">
            <p>{{ question.text }}</p>
            <ul>
              <li v-for="answer in question.answers" :key="answer.value" :class="{ 'card-large' : question.card_size == 'large'}">
                <button @click="chooseAnswer(question, answer)">
                  <img v-if="answer.img && answer.img.length > 0" :src="answer.img"/>
                  <span>{{ answer.value }}</span>
                </button>
              </li>
              <li>
                <input v-if="question.custom_input" :name="'result_' + question.id" type="text" class="form-control" :placeholder="question.custom_input_placeholder">
              </li>
            </ul>
            <button v-if="result && result.length > 0" @click="prevQuestion()" class="btn btn-outline-primary">Назад</button>
            <button @click="nextQuestion()" class="btn btn-primary">Далее</button>
          </div>
        </div>
        <div v-if="active_question == 200">
          <ul>
          <template v-for="resultItem in result">
            <li v-if="resultItem && resultItem.question && resultItem.question.length > 0">
              <strong>{{ resultItem.question }}</strong><br>
              {{ resultItem.answer }}</li>
          </template>
        </ul>
          <!-- <label class="form-label">Телефон</label>
          <input type="text" class="form-control" placeholder="+7 999 123-45-67"> -->
        </div>
      </div>
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
              {value: 'Да', next_question: 9, img: '/img/quiz/1f44d.png'},
              {value: 'Нет, хочу определиться!', next_question: 2, img: '/img/quiz/1f9d0.png'}
            ],
            custom_input: false,
            custom_input_placeholder: null,
            card_size: 'normal',
            default_next_question: null
          },
          {
            id: 2,
            text: 'Имеете ли вы опыт в майнинге?',
            answers: [
              {value: 'Да, есть небольшой опыт', next_question: 103, img: '/img/quiz/2714-fe0f.png'},
              {value: 'Нет, я новичок', next_question: 103, img: '/img/quiz/2716-fe0f.png'}
            ],
            custom_input: false,
            custom_input_placeholder: null,
            card_size: 'normal',
            default_next_question: null
          },
          {
            id: 103,
            text: 'Где Вы планируете размещать оборудование?',
            answers: [
              {value: 'В квартире, в жилом помещении или на балконе', next_question: 104, img: null},
              {value: 'Есть отдельное помещение под майнинг', next_question: 104, img: null},
              {value: 'Еще не определился с размещением', next_question: 104, img: null}
            ],
            custom_input: true,
            custom_input_placeholder: 'Другое...',
            card_size: 'normal',
            default_next_question: 104
          },
          {
            id: 104,
            text: 'Какой бюджет Вы планируете инвестировать?',
            answers: [],
            custom_input: true,
            custom_input_placeholder: 'например: около 500 000 руб.',
            card_size: 'normal',
            default_next_question: 105
          },
          {
            id: 105,
            text: 'Какая у вас стоимость электричества?',
            answers: [
              {value: 'Менее 3 рублей за кВт', next_question: 106, img: null},
              {value: '3-6 рублей за кВт', next_question: 106, img: null},
              {value: 'Более 6 рублей за кВт', next_question: 106, img: null},
            ],
            custom_input: true,
            custom_input_placeholder: 'Другое...',
            card_size: 'normal',
            default_next_question: 106
          },
          {
            id: 106,
            text: 'Как Вы планируете производить оплату?',
            answers: [
              {value: 'Наличными', next_question: 107, img: null},
              {value: 'Переводом на карту', next_question: 107, img: null},
              {value: 'Оплата по безналу', next_question: 107, img: null},
              {value: 'Наложенный платеж с оплатой при получении', next_question: 107, img: null}
            ],
            custom_input: false,
            custom_input_placeholder: null,
            card_size: 'normal',
            default_next_question: null
          },
          {
            id: 107,
            text: 'Нужна ли Вам доставка оборудования?',
            answers: [
              {value: 'Да', next_question: 108, img: '/img/quiz/2714-fe0f.png'},
              {value: 'Нет, самовывоз из Уфы', next_question: 200, img: '/img/quiz/2716-fe0f.png'}              
            ],
            custom_input: false,
            custom_input_placeholder: null,
            card_size: 'normal',
            default_next_question: null
          },
          {
            id: 108,
            text: 'В какой город нужна доставка?',
            answers: [],
            custom_input: true,
            custom_input_placeholder: 'например: Уфа',
            card_size: 'normal',
            default_next_question: 200
          },
          {
            id: 9,
            text: 'Какое оборудование вы хотите?',
            answers: [
              {value: 'Асики', next_question: 10, img: '/img/quiz/yrjf7nxe5bhdvewqikeb.jpg'},
              {value: 'Видеокарты', next_question: 13, img: '/img/quiz/cb7zskswqkuykagvjgih.jpg'},
              {value: 'Майнинг-фермы', next_question: 15, img: '/img/quiz/p4lb7raszn7pzjnm3pzu.jpg'}
            ],
            custom_input: false,
            custom_input_placeholder: null,
            card_size: 'large',
            default_next_question: null
          },
          {
            id: 10,
            text: 'У вас есть предпочтения по производителю?',
            answers: [
              {value: 'Нет предпочтений', next_question: 11, img: '/img/quiz/2716-fe0f.png'},
              {value: 'Да, хочу выбрать', next_question: 12, img: '/img/quiz/2714-fe0f.png'},
            ],
            custom_input: false,
            custom_input_placeholder: null,
            card_size: 'normal',
            default_next_question: null
          },
          {
            id: 11,
            text: 'Что Вам важно при выборе асика?',
            answers: [
              {value: 'Стабильность работы', next_question: 103, img: '/img/quiz/1f6e0-fe0f.png'},
              {value: 'Быстрая окупаемость', next_question: 103, img: '/img/quiz/267b-fe0f.png'},
              {value: 'Самый большой доход', next_question: 103, img: '/img/quiz/1f4b5.png'},
            ],
            custom_input: false,
            custom_input_placeholder: null,
            card_size: 'normal',
            default_next_question: null
          },
          {
            id: 12,
            text: 'Какой бренд для Вас приоритетнее?',
            answers: [
              {value: 'Bitmain', next_question: 103, img: null},
              {value: 'Innosilicon', next_question: 103, img: null},
              {value: 'Whatsminer', next_question: 103, img: null},
            ],
            custom_input: true,
            custom_input_placeholder: 'Другое...',
            card_size: 'normal',
            default_next_question: 103
          },
          {
            id: 13,
            text: 'Какие видеокарты Вы бы хотели?',
            answers: [
              {value: 'AMD', next_question: 14, img: '/img/quiz/sfzcgnjwfod8xbtxzdrg.png'},
              {value: 'NVIDIA', next_question: 14, img: '/img/quiz/j539hpguw6eixcz7kmf7.png'},
            ],
            custom_input: false,
            custom_input_placeholder: null,
            card_size: 'large',
            default_next_question: null
          },
          {
            id: 14,
            text: 'Возможно вы знаете уже модель видеокарты?',
            answers: [],
            custom_input: true,
            custom_input_placeholder: 'например: GeForce 3060Ti',
            card_size: 'normal',
            default_next_question: 103
          },
          {
            id: 15,
            text: 'На каком уровне Вы знакомы с майнинг-фермами?',
            answers: [
              {value: 'У меня есть сейчас или была майнинг-ферма', next_question: 16, img: '/img/quiz/1f9d0.png'},
              {value: 'У меня нет и никогда не было майнинг-фермы', next_question: 16, img: '/img/quiz/1f468-200d-1f393.png'},
            ],
            custom_input: false,
            custom_input_placeholder: null,
            card_size: 'normal',
            default_next_question: null
          },
          {
            id: 16,
            text: 'На каких видеокартах вы хотите майнинг-ферму?',
            answers: [
              {value: 'AMD', next_question: 17, img: '/img/quiz/sfzcgnjwfod8xbtxzdrg.png'},
              {value: 'NVIDIA', next_question: 17, img: '/img/quiz/j539hpguw6eixcz7kmf7.png'},
            ],
            custom_input: false,
            custom_input_placeholder: null,
            card_size: 'large',
            default_next_question: null
          },
          {
            id: 17,
            text: 'На скольких видеокартах будет собрана ваша Майнинг-ферма?',
            answers: [
              {value: 'На 4 видеокарты', next_question: 19, img: null},
              {value: 'На 6 видеокарты', next_question: 19, img: null},
              {value: 'На 8 видеокарты', next_question: 19, img: null},
              {value: 'На 12 видеокарты', next_question: 19, img: null}
            ],
            custom_input: false,
            custom_input_placeholder: null,
            card_size: 'normal',
            default_next_question: null
          },
          {
            id: 19,
            text: 'Какие у вас есть пожелания к сборке Майнинг-фермы?',
            answers: [],
            custom_input: true,
            custom_input_placeholder: 'например: мне нужны видеокарты определенного производителя',
            card_size: 'normal',
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
        document.querySelectorAll(".question").forEach((item) => {
          item.classList.remove('fadein')
        })

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
        
        document.getElementById('question_' + this.active_question).classList.add('fadein')
      },
      prevQuestion() {
        document.querySelectorAll(".question").forEach((item) => {
          item.classList.remove('fadein')
        })

        var q = this.questions.find(x => x.id === this.active_question)

        if(this.result && this.result.length > 0) {
          this.active_question = this.result.pop().id
        }
      }
    }
  }
</script>