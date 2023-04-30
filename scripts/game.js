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

        initBoard()

        document.addEventListener("keyup", (e) => {

            if (guessesRemaining === 0) {
                return
            }

            let pressedKey = String(e.key)
            if (pressedKey === "Backspace" && nextLetter !== 0) {
                deleteLetter()
                return
            }

            if (pressedKey === "Enter") {
                checkGuess()
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
                // is letter in the correct guess
                if (letterPosition === -1) {
                    letterColor = 'grey'
                } else {
                    // now, letter is definitely in word
                    // if letter index and right guess index are the same
                    // letter is in the right position 
                    if (currentGuess[i] === rightGuess[i]) {
                        // shade green 
                        letterColor = 'green'
                    } else {
                        // shade box yellow
                        letterColor = 'yellow'
                    }

                    rightGuess[letterPosition] = "#"
                }

                let delay = 200 * i
                setTimeout(() => {
                    //shade box
                    box.style.backgroundColor = letterColor
                    shadeKeyBoard(letter, letterColor)
                }, delay)
            }

            if (guessString === rightGuessString) {
                guessesRemaining = 0
                return
            } else {
                guessesRemaining -= 1;
                currentRow = currentRow + 1;
                currentGuess = [];
                nextLetter = 0;

                setTimeout(() => {
                    if (guessesRemaining === 0) {
                        alert("You've run out of guesses! Game over!")
                        alert(`The right word was: "${rightGuessString}"`)
                    }
                    else {
                        initBoard();
                    }
                }, 200 * rightGuessString.length)
            }
        }

        function shadeKeyBoard(letter, color) {
            for (const elem of document.getElementsByClassName("keyboard-button")) {
                if (elem.textContent === letter) {
                    let oldColor = elem.style.backgroundColor
                    if (oldColor === 'green') {
                        return
                    }

                    if (oldColor === 'yellow' && color !== 'green') {
                        return
                    }

                    elem.style.backgroundColor = color
                    
                    break
                }
            }
        }
    });