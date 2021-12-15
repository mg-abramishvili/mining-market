<template>
  <div>
    {{ result }}
    <div v-for="question in questions" :key="'question_' + question.id" :id="'question_' + question.id">
      <div v-if="active_question == question.id">
        <h5>{{ question.text }}</h5>
        <input v-model="result.questions[question.id]" type="text">
        <ul>
          <li v-for="answer in question.answers" :key="answer.value">
            <button @click="chooseAnswer(question, answer)">{{ answer.value }}</button>
          </li>
        </ul>
        <button @click="nextQuestion()">Далее</button>
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
              {value: 'Да', next_question: 2},
              {value: 'Нет, хочу определиться!', next_question: 2}
            ],
            default_next_question: 2
          },
          {
            id: 2,
            text: 'Имеете ли вы опыт в майнинге?',
            answers: [
              {value: 'Да, есть небольшой опыт', next_question: 3},
              {value: 'Нет, я новичок', next_question: 3}
            ],
            default_next_question: 3
          },
          {
            id: 3,
            text: 'Где Вы планируете размещать оборудование?',
            answers: [
              {value: 'В квартире, в жилом помещении или на балконе', next_question: 4},
              {value: 'Есть отдельное помещение под майнинг', next_question: 4},
              {value: 'Еще не определился с размещением', next_question: 4}
            ],
            default_next_question: 4
          },
          {
            id: 4,
            text: 'Какой бюджет Вы планируете инвестировать?',
            answers: [],
            default_next_question: 5
          },
          {
            id: 5,
            text: 'Какая у вас стоимость электричества?',
            answers: [
              {value: 'Менее 3 рублей за кВт', next_question: 6},
              {value: '3-6 рублей за кВт', next_question: 6},
              {value: 'Более 6 рублей за кВт', next_question: 6},
              {value: 'Нужна консультация по этому вопросу', next_question: 6}
            ],
            default_next_question: 6
          },
          {
            id: 6,
            text: 'Как Вы планируете производить оплату?',
            answers: [
              {value: 'Наличными', next_question: 7},
              {value: 'Переводом на карту', next_question: 7},
              {value: 'Оплата по безналу', next_question: 7},
              {value: 'Наложенный платеж с оплатой при получении', next_question: 7}
            ],
            default_next_question: 7
          },
          {
            id: 7,
            text: 'Нужна ли Вам доставка оборудования?',
            answers: [
              {value: 'Да', next_question: 8},
              {value: 'Нет, самовывоз из Уфы', next_question: 8}              
            ],
            default_next_question: 8
          },
          {
            id: 8,
            text: 'В какой город нужна доставка?',
            answers: [],
            default_next_question: null
          },
        ],

        active_question: 1,

        result: {
          questions: []
        },
      };
    },
    mounted() {
      // this.questions.forEach(function(question) {
      //   if(document.getElementById('question_' + question.id)) {
      //     document.getElementById('question_' + question.id).style.display = 'none'
      //   }
      // })
      // document.getElementById('question_1').style.display = 'block'
    },
    computed: {
      
    },
    methods: {
      chooseAnswer(question, answer) {
          // console.log(question.text + ': ' + answer.value)
          this.result.questions[question.id] = question.text + ': ' + answer.value
          this.nextQuestion(answer.next_question)
      },
      nextQuestion(next_question) {
        if(next_question && next_question > 0) {
          this.active_question = next_question
        } else {
          var q = this.questions.find(x => x.id === this.active_question)
          this.result.questions[q.id] = q.text + ': ' + this.result.questions[q.id]
          this.active_question = q.default_next_question
        }
      }
    }
  }
</script>