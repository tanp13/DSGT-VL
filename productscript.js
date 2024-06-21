const quizData = [
    {
        question: "How many licence plates are there that exactly contain three letters",
        a: "26*3",
        b: "3*3*3",
        c: "26*26*26",
        d: "26*26*3",
        correct: "c",
    },
    {
        question: "8 women and 5 men are elected for president. How many man vs women pairs we can make?",
        a: "14",
        b: "40",
        c: "18",
        d: "20",
        correct: "b",
    },
    {
        question: "A boy has 3 shirts and 4 pants . In how many ways he can dress up?",
        a: "12",
        b: "7",
        c: "25",
        d: "20",
        correct: "a",
    },
    {
        question: "A code contains two letters followed by three digits with the first digit as non-zero then the total no. of possible codes will be?",
        a: "26*9",
        b: "26*26*9*9*9",
        c: "26*2*9*3",
        d: "none of the above",
        correct: "b",
    },
    {
        question: "8 women and 5 men are elected for president. How many man vs women pairs we can make?",
        a: "18",
        b: "40",
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