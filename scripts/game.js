let nrTries = 0;
let guessesRemaining = 10;
let currentGuess = [];
let nextLetter = 0;
let rightGuessString = "";
let currentRow = 0;

fetch('../server/info.php')
    .then(result => result.json())
    .then(data => {
        rightGuessString = data.word;
        nrTries = data.tries;
        guessesRemaining = nrTries;

        console.log(rightGuessString + " " + nrTries);

        let board = document.getElementById("game-board");

        function initBoard() {
            let row = document.createElement("div")
            row.className = "letter-row"

            for (let j = 0; j < rightGuessString.length; j++) {
                let box = document.createElement("div")
                box.className = "letter-box"
                row.appendChild(box)
            }

            board.appendChild(row)
        }

        function youLostOn() {
            document.getElementById("mainMenuLost").style.display = 'flex';
            document.getElementById("icon-game-page").setAttribute("style", "filter: blur(8px)");
            document.getElementById("game-board").setAttribute("style", "filter: blur(8px)");
            document.getElementById("submit-button").setAttribute("style", "filter: blur(8px)");
        }

        function youLostOff() {
            document.getElementById("mainMenuLost").style.display = 'none';
            document.getElementById("icon-game-page").setAttribute("style", "filter: blur(0px)");
            document.getElementById("game-board").setAttribute("style", "filter: blur(0px)");
            document.getElementById("submit-button").setAttribute("style", "filter: blur(0px)");
        }

        function youWonOn() {
            document.getElementById("mainMenuWon").style.display = 'flex';
            document.getElementById("icon-game-page").setAttribute("style", "filter: blur(8px)");
            document.getElementById("game-board").setAttribute("style", "filter: blur(8px)");
            document.getElementById("submit-button").setAttribute("style", "filter: blur(8px)");
        }

        function youWonOff() {
            document.getElementById("mainMenuWon").style.display = 'none';
            document.getElementById("icon-game-page").setAttribute("style", "filter: blur(0px)");
            document.getElementById("game-board").setAttribute("style", "filter: blur(0px)");
            document.getElementById("submit-button").setAttribute("style", "filter: blur(0px)");
        }

        initBoard()
        youLostOff()
        youWonOff()

        var clicked = false

        document.getElementById('submit-button').addEventListener("click", function () {
            clicked = true
            document.dispatchEvent(new KeyboardEvent('keydown', { 'key': '\\' }));
            document.dispatchEvent(new KeyboardEvent('keyup', { 'key': '\\' }));
            console.log("hey")
        });

        document.addEventListener("keyup", (e) => {

            if (guessesRemaining === 0) {
                return
            }

            let pressedKey = String(e.key)
            if (pressedKey === "Backspace" && nextLetter !== 0) {
                deleteLetter()
                return
            }

            if (pressedKey === "Enter" || clicked === true) {
                checkGuess()
                clicked = false;
                return
            }

            let found = pressedKey.match(/[a-z]/gi)
            if (!found || found.length > 1) {
                return
            } else {
                insertLetter(pressedKey)
            }
        })
        function insertLetter(pressedKey) {
            if (nextLetter === rightGuessString.length) {
                return
            }
            pressedKey = pressedKey.toLowerCase()

            let row = document.getElementsByClassName("letter-row")[currentRow]
            let box = row.children[nextLetter]
            box.textContent = pressedKey
            box.classList.add("filled-box")
            currentGuess.push(pressedKey)
            nextLetter += 1
        }

        function deleteLetter() {
            let row = document.getElementsByClassName("letter-row")[currentRow]
            let box = row.children[nextLetter - 1]
            box.textContent = ""
            box.classList.remove("filled-box")
            currentGuess.pop()
            nextLetter -= 1
        }

        function checkGuess() {
            let row = document.getElementsByClassName("letter-row")[currentRow]
            let guessString = ''
            let rightGuess = Array.from(rightGuessString)

            for (const val of currentGuess) {
                guessString += val
            }

            if (guessString.length != rightGuessString.length) {
                alert("Not enough letters!")
                return
            }

            for (let i = 0; i < rightGuessString.length; i++) {
                let letterColor = ''
                let box = row.children[i]
                let letter = currentGuess[i]

                let letterPosition = rightGuess.indexOf(currentGuess[i])
                if (letterPosition === -1) {
                    letterColor = 'grey'
                } else {
                    if (currentGuess[i] === rightGuess[i]) {
                        letterColor = 'green'
                    } else {
                        letterColor = 'yellow'
                    }

                    rightGuess[letterPosition] = "#"
                }

                let delay = 200 * i
                setTimeout(() => {
                    box.style.color = "black"
                    box.style.backgroundColor = letterColor
                }, delay)
            }

            if (guessString === rightGuessString) {
                setTimeout(() => {
                    youWonOn()
                    guessesRemaining = 0
                    return
                }, 200 * rightGuessString.length)
            } else {
                guessesRemaining -= 1;
                currentRow = currentRow + 1;
                currentGuess = [];
                nextLetter = 0;

                setTimeout(() => {
                    if (guessesRemaining === 0) {
                        youLostOn();
                        alert(`The right word was: "${rightGuessString}"`)
                    }
                    else {
                        initBoard();
                    }
                }, 200 * rightGuessString.length)
            }
        }
    });