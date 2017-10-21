(function() {
    var password = document.getElementById('password');

    var helper = {
        letterLength: document.querySelector('.helper .length'),
        lowerCase: document.querySelector('.helper .lower'),
        uppercase: document.querySelector('.helper .upper'),
        special: document.querySelector('.helper .special')
    };

    var goodPass = {
        letterLength: function () {
            if (password.value.length >= 8) {

                return true;
            }
        },
        lowerCase: function () {
            var regex = /^(?=.*[a-z]).+$/;
            if (regex.test(password.value)) {
                return true;
            }
        },
        uppercase: function () {
            var regex = /^(?=.*[A-Z]).+$/;
            if (regex.test(password.value)) {
                return true;
            }
        },
        special: function () {
            var regex = /^(?=.*[0-9]).+$/;
            if (regex.test(password.value)) {
                return true;
            }
        }
    };

    password.addEventListener('keyup', function () {

        patternTest(goodPass.letterLength(), helper.letterLength);


        patternTest(goodPass.lowerCase(), helper.lowerCase);


        patternTest(goodPass.uppercase(), helper.uppercase);


        patternTest(goodPass.special(), helper.special);


        if (hasClass(helper.letterLength, 'valid') &&
            hasClass(helper.lowerCase, 'valid') &&
            hasClass(helper.uppercase, 'valid') &&
            hasClass(helper.special, 'valid')
        ) {
            addClass(password.parentElement, 'valid');
        }
        else {
            removeClass(password.parentElement, 'valid');
        }
    });

    function patternTest(pattern, response) {
        if (pattern) {
            addClass(response, 'valid');
        }
        else {
            removeClass(response, 'valid');
        }
    }

    function addClass(el, className) {
        if (el.classList) {
            el.classList.add(className);
        }
        else {
            el.className += ' ' + className;
        }
    }

    function removeClass(el, className) {
        if (el.classList)
            el.classList.remove(className);
        else
            el.className = el.className.replace(new RegExp('(^|\\b)' + className.split(' ').join('|') + '(\\b|$)', 'gi'), ' ');
    }

    function hasClass(el, className) {
        if (el.classList) {
            console.log(el.classList);
            return el.classList.contains(className);
        }
        else {
            new RegExp('(^| )' + className + '( |$)', 'gi').test(el.className);
        }
    }

})();

