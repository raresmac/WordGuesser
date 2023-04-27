var button = document.getElementsByClassName("rectangle-number-choice");
var button2 = document.getElementsByClassName("rectangle-number-try");

var addSelectClass = function () {
    removeSelectClass();
    this.classList.add('selected');
}

var removeSelectClass = function () {
    for (var i = 0; i < button.length; i++) {
        button[i].classList.remove('selected')
    }
}

for (var i = 0; i < button.length; i++) {
    button[i].addEventListener("click", addSelectClass);
}

var addSelectClass2 = function () {
    removeSelectClass2();
    this.classList.add('selected');
}

var removeSelectClass2 = function () {
    for (var i = 0; i < button2.length; i++) {
        button2[i].classList.remove('selected')
    }
}

for (var i = 0; i < button2.length; i++) {
    button2[i].addEventListener("click", addSelectClass2);
}