const quizData = [
    {
        question: "A bag contains 10 red marbles, 10 white marbles, and 10 blue marbles. What is the minimum no. of marbles you have to choose randomly from the bag to ensure that we get 4 marbles of same color?",
        a: "4",
        b: "8",
        c: "10",
        d: "15",
        correct: "c",
    },
    {
        question: "In a computer science department, a student club can be formed with either 10 members from first year or 8 members from second year or 6 from third year or 4 from final year. What is the minimum no. of students we have to choose randomly from department to ensure that a student club is formed?",
        a: "10",
        b: "25",
        c: "28",
        d: "14",
        correct: "b",
    },
    {
        question: "How many students do you need in a school to guarantee that there are at least 2 students who have the same first two initials",
        a: "677",
        b: "676",
        c: "72",
        d: "100",
        correct: "a",
    },
    {
        question: "How many cards must be selected from the deck of 52 cards to gaurantee that atleast 3 ace cards are selected?",
        a: "4",
        b: "10",
        c: "13",
        d: "39",
        correct: "b",
    },
    {
        question: "A box contains three pairs of socks colored red, blue, and white, respectively. Suppose I take out the socks without looking at them. How many socks must I take out to be sure that they will include a matching pair?",
        a: "1",
        b: "4",
        c: "2",
        d: "6",
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