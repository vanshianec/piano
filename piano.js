const piano = document.getElementById("piano");
const keys = piano.getElementsByClassName("key");
const whiteKeys = piano.getElementsByClassName('white');

for (let i = 0; i < whiteKeys.length; i++) {
    whiteKeys[i].style.left = `${i * 35 + 1}px`;
}

for (let i = 0; i < keys.length; i++) {
    let key = keys[i];
    let note = key.classList[2];
    key.addEventListener('click', () => {
        playNote(note);
    });
}

function playNote(note) {
    let sound = document.getElementById(note);
    sound.currentTime = 0;
    sound.play();
}


function checkTyping() {
	
const text = document.getElementById("text").innerText;
let index = 0;
	
    const input = document.getElementById("input").value;
    let newText = "";
    for (let i = 0; i < text.length; i++) {
        if (input[i] === text[i]) {
            newText += `<span class="highlight-green">${text[i]}</span>`;
            index = i;
        } else if (i < input.length) {
            newText += `<span class="highlight-red">${text[i]}</span>`;
        } else {
            newText += text[i];
        }
    }
    document.getElementById("text").innerHTML = newText;
}
