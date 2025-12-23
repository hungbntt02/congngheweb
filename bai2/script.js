fetch("quiz.txt")
  .then((response) => response.text())
  .then((data) => {
    const quizContainer = document.getElementById("quiz-container");
    const questions = parseQuiz(data);
    displayQuiz(questions, quizContainer);
    window.quizData = questions;
  });

function parseQuiz(data) {
  const lines = data.split(/\r?\n/);
  const questions = [];
  let currentQuestion = null;

  lines.forEach((line) => {
    line = line.trim();
    if (!line) return;
    if (/^ANSWER:/.test(line)) {
      currentQuestion.answer = line.replace("ANSWER:", "").trim();
      questions.push(currentQuestion);
      currentQuestion = null;
    } else if (/^[A-D]\./.test(line)) {
      currentQuestion.options.push({
        label: line[0],
        text: line.substring(2).trim(),
      });
    } else {
      currentQuestion = { question: line, options: [], answer: "" };
    }
  });
  return questions;
}

function displayQuiz(questions, container) {
  container.innerHTML = "";
  questions.forEach((q, idx) => {
    const div = document.createElement("div");
    div.className = "question";
    div.innerHTML = `<p>${idx + 1}. ${q.question}</p>`;
    const optionsDiv = document.createElement("div");
    optionsDiv.className = "options";
    q.options.forEach((opt) => {
      const optionHTML = `<label><input type="checkbox" name="q${idx}" value="${opt.label}"> ${opt.label}. ${opt.text}</label>`;
      optionsDiv.innerHTML += optionHTML;
    });
    div.appendChild(optionsDiv);
    container.appendChild(div);
  });
}

function checkAnswers() {
  let score = 0;
  const questions = window.quizData;
  questions.forEach((q, idx) => {
    const selected = Array.from(
      document.querySelectorAll(`input[name=q${idx}]:checked`)
    )
      .map((i) => i.value)
      .sort()
      .join(",");
    const correct = q.answer.replace(/\s/g, "");
    if (selected === correct) score++;
  });
  document.getElementById(
    "result"
  ).innerText = `Bạn trả lời đúng ${score} / ${questions.length} câu.`;
}
