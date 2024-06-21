const quizData = [
    {
        question: "Among 50 patients admitted to the hospital to a hospital, 25 are diagnosed with pneumonia,30 with bronchitis.Determine  (a)The number of patients diagnosed with pneumonia or bronchitis (or both).(b)The number of patients not diagnosed with pneumonia or bronchitis.",
        a: "55,5",
        b: "20,10",
        c: "45,5",
        d: "55,10",
        correct: "c",
    },
    {
        question: "A large software development company employs 100 computer programmers. Of them, 45 are proficient in Java, 30 in C#, 20 in Python, six in C# and Java, one in Java and Python, five in C# and Python, and just one programmer  is proficient in all three languages above. Determine the number of computer programmers that are not proficient in any of these three languages?",
        a: "20",
        b: "16",
        c: "24",
        d: "12",
        correct: "b",
    },
    {
        question: "There are 350 farmers in a large region. 260 farm beetroot, 100 farm yams, 70 farm radish, 40 farm beetroot and radish, 40 farm yams and radish, and 30 farm beetroot and yams. Let B, Y, and R denote the set of farms that farm beetroot, yams and radish respectively.Determine how many farmers farm beetroot, yams, and radish?",
        a: "30",
        b: "10",
        c: "40",
        d: "20",
        correct: "a",
    },
    {
        question: "Among a group of students, 49 study Physics, 37 study English and 21 study Biology. If 9 of these students study Maths, Physics and English, 5 study English and Biology, 4 study Physics and Biology and 3 study Physics, English and Biology, find the number of students in the group?",
        a: "91",
        b: "92",
        c: "86",
        d: "none of the above",
        correct: "b",
    },
    {
        question: "A total of 1232 students have taken a course in Spanish, 879 have taken a course in French, and 114 have taken a course in Russian. Further, 103 have taken courses in both Spanish and French, 23 have taken courses in both Spanish and Russian, and 14 have taken courses in both French and Russian. If 2092 students have taken a course in atleast one of Spanish French and Russian, how many students have taken a course in all 3 languages? ",
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