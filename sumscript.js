const quizData = [
    {
        question: "8 women and 5 men are elected for president . How many ways are there to select the winner?",
        a: "10",
        b: "40",
        c: "13",
        d: "26",
        correct: "c",
    },
    {
        question: "18 Girls and 15 Boys are going for camping.Among them 10 girls and 5 boys opted for best student award. How manys ways are there to select the best student?",
        a: "33",
        b: "15",
        c: "50",
        d: "270",
        correct: "b",
    },
    {
        question: "The department will award a free laptop to either a CS student or a CS professor. How many different choicess are there if there are 530 students and 15 professors",
        a: "545",
        b: "354",
        c: "687",
        d: "515",
        correct: "a",
    },
    {
        question: "18 Girls and 15 Boys are going for camping.Among them 10 girls and 5 boys opted for best student award. How manys ways are there to select the best student?",
        a: "91",
        b: "92",
        c: "86",
        d: "none of the above",
        correct: "b",
    },
    {
        question: "In a society election of secretary. There were 3 men and 4 women candidates. How many ways are there to choose the secretary?",
        a: "18",
        b: "7",
        c: "10",
        d: "45",
        correct: "b",
    }
];
const quiz= document.getElementById('quiz')
const answerEls = document.querySelectorAll('.answer')
const questionEl = document.getElementById('question')
const a_text = document.getElementById('a_text')
const b_text = document.getElementById('b_text')
const c_text = document.getElementById('c_text')
const d_text = document.getElementById('d_text')
const submitBtn = document.getElementById('submit')
let currentQuiz = 0
let score = 0
loadQuiz()
function loadQuiz() {
    deselectAnswers()
    const currentQuizData = quizData[currentQuiz]
    questionEl.innerText = currentQuizData.question
    a_text.innerText = currentQuizData.a
    b_text.innerText = currentQuizData.b
    c_text.innerText = currentQuizData.c
    d_text.innerText = currentQuizData.d
}
function deselectAnswers() {
    answerEls.forEach(answerEl => answerEl.checked = false)
}
function getSelected() {
    let answer
    answerEls.forEach(answerEl => {
        if(answerEl.checked) {
            answer = answerEl.id
        }
    })
    return answer
}
submitBtn.addEventListener('click', () => {
    const answer = getSelected()
    if(answer) {
       if(answer === quizData[currentQuiz].correct) {
           score++
       }
       currentQuiz++
       if(currentQuiz < quizData.length) {
           loadQuiz()
       } else {
           quiz.innerHTML = `
           <h2>You answered ${score}/${quizData.length} questions correctly</h2>
           <h2>Your accuracy is ${(score / 5) * 100} %</h2>
           <button onclick="location.reload()">Reload</button>
           `
       }
    }
})