function disableElement(elem) {

    elem.setAttribute('disabled', 'disabled');
}

function enableElement(elem) {
    elem.removeAttribute('disabled');
}

function disableAndHideElement(elem) {
    disableElement(elem);
    let parent = elem.closest('.form-group');
    parent.classList.add('d-none');
}

function enableAndUnhideElement(elem) {
    enableElement(elem);
    let parent = elem.closest('.form-group');
    parent.classList.remove('d-none');

}

function fireDownStreamEvent(elem, func) {
    const event = new Event('change');
    elem.addEventListener('change', func, false);
    elem.dispatchEvent(event);

}

function valid(elem) {
    if (elem.value.length > 0) {
        return elem.matches(':invalid') ? false : true;
    } else {
        return false;
    }
}

function validateInitialInputs(event) {

    const elem_names = {
        NAME: 'comments_name',
        EMAIL: 'comments_email'
    }

    let elem = event.currentTarget;
    let other_elem = null;
    let next_question = document.querySelector('#comments_fuel');

    switch (elem.id) {
        case elem_names.NAME:
            other_elem = document.querySelector(`#${elem_names.EMAIL}`);
            break;
        case elem_names.EMAIL:
            other_elem = document.querySelector(`#${elem_names.NAME}`);
            break;
        default:
            console.log('Oh no.')
    }

    if (valid(elem) && valid(other_elem)) {
        enableElement(next_question);
    } else {
        disableElement(next_question);
    }

}

function fuelQuestion(event) {

    let elem = event.currentTarget;
    let value = elem.value;

    let next_elem = document.querySelector('#comments_employee');

    switch (value) {
        case "0":
            next_elem.value = 0;
            disableAndHideElement(next_elem);
            fireDownStreamEvent(next_elem, employeeQuestion);
            break;
        case "1":
            enableAndUnhideElement(next_elem);
            break;
        case "2":
            next_elem.value = 0;
            disableAndHideElement(next_elem);
            fireDownStreamEvent(next_elem, employeeQuestion);
            break;
        default:
            console.log(value)
    }

}

function employeeQuestion(event) {

    let elem = event.currentTarget;
    let next_elem = document.querySelector('#comments_payment');
    let value = elem.value;

    switch (value) {
        case "0":
            next_elem.value = 0;
            disableAndHideElement(next_elem);
            fireDownStreamEvent(next_elem, paymentQuestion);
            break;
        case "1":
            enableAndUnhideElement(next_elem);
            break;
        case "2":
            next_elem.value = 0;
            disableAndHideElement(next_elem);
            fireDownStreamEvent(next_elem, paymentQuestion);
            break;
        default:
            console.log(value)
    }

}

function paymentQuestion(event) {

    let elem = event.currentTarget;
    let next_elem = document.querySelector('#comments_returns');
    let value = elem.value;

    switch (value) {
        case "0":
            next_elem.value = 0;
            disableAndHideElement(next_elem);
            fireDownStreamEvent(next_elem, returnsQuestion);
            break;
        case "1":
            enableAndUnhideElement(next_elem);
            break;
        case "2":
            next_elem.value = 0;
            disableAndHideElement(next_elem);
            fireDownStreamEvent(next_elem, returnsQuestion);
            break;
        default:
            console.log(value)
    }

}

function returnsQuestion(event) {

    let elem = event.currentTarget;
    let next_elem = document.querySelector('#comments_lost');
    let value = elem.value;

    switch (value) {
        case "0":
            next_elem.value = 0;
            disableAndHideElement(next_elem);
            fireDownStreamEvent(next_elem, lostQuestion);
            break;
        case "1":
            enableAndUnhideElement(next_elem);
            break;
        case "2":
            next_elem.value = 0;
            disableAndHideElement(next_elem);
            fireDownStreamEvent(next_elem, lostQuestion);
            break;
        default:
            console.log(value)
    }

}

function lostQuestion(event) {

    let elem = event.currentTarget;
    let store_elem = document.querySelector('#comments_store');
    let phone_elem = document.querySelector('#comments_phone');
    let app_elem = document.querySelector('#comments_application')
    let value = elem.value;

    switch (value) {
        case "0":
            store_elem.value = '';
            phone_elem.value = '';
            app_elem.value = 0;
            disableAndHideElement(store_elem);
            disableAndHideElement(phone_elem);
            disableAndHideElement(app_elem);
            fireDownStreamEvent(store_elem, storeQuestion);
            fireDownStreamEvent(phone_elem, phoneQuestion);
            fireDownStreamEvent(app_elem, applicationQuestion);
            break;
        case "1":
            enableAndUnhideElement(store_elem);
            disableAndHideElement(phone_elem);
            fireDownStreamEvent(phone_elem, phoneQuestion);
            break;
        case "2":
            app_elem.value = 0;

            enableAndUnhideElement(store_elem);
            enableAndUnhideElement(phone_elem);

            disableAndHideElement(app_elem);
            fireDownStreamEvent(app_elem);
            break;
        default:
            console.log(value)
    }

}

function phoneQuestion(event) {

    let elem = event.currentTarget;
    let store_elem = document.querySelector('#comments_store');
    let message = document.querySelector('#comments_text');

    valid(elem) ? fireDownStreamEvent(store_elem, storeQuestion) : disableElement(message);

}

function storeQuestion(event) {

    let elem = event.currentTarget;
    let lost_elem = document.querySelector('#comments_lost');
    let app_elem = document.querySelector('#comments_application');
    let phone_elem = document.querySelector('#comments_phone');
    let message = document.querySelector('#comments_text');

    switch (lost_elem.value) {
        case "":
            break;
        case "0":
            break;
        case "1":
            enableAndUnhideElement(app_elem);
            break;
        case "2":
            if (elem.value !== '') {
                valid(phone_elem) ? enableElement(message) : disableElement(message);
            } else {
                disableElement(message);
            }
            break;
        default:
            console.log(elem.value)

    }

}

function applicationQuestion(event) {

    let elem = event.currentTarget;
    let completed_elem = document.querySelector('#comments_completed');
    let deer_elem = document.querySelector('#comments_deer');
    let value = elem.value;

    switch (value) {
        case "0":
            completed_elem.value = 0;
            deer_elem.value = 0;
            disableAndHideElement(completed_elem);
            disableAndHideElement(deer_elem);
            fireDownStreamEvent(completed_elem, completedQuestion);
            fireDownStreamEvent(deer_elem, deerQuestion);
            break;
        case "1":
            enableAndUnhideElement(deer_elem);
            disableAndHideElement(completed_elem);
            fireDownStreamEvent((completed_elem));
            break;
        case "2":
            enableAndUnhideElement(completed_elem);
            disableAndHideElement(deer_elem);
            fireDownStreamEvent(deer_elem, deerQuestion);
            break;
        default:
            console.log(value)
    }

}

function completedQuestion(event) {

    let elem = event.currentTarget;
    let next_elem = document.querySelector('#comments_deer');
    let value = elem.value;

    switch (value) {
        case "0":
            break;
        case "1":
            console.log('URL Route');
            break;
        case "2":
            console.log('URL Route');
            break;
        default:
            console.log(value)
    }

}

function deerQuestion(event) {

    let elem = event.currentTarget;
    let message = document.querySelector('#comments_text');
    let value = elem.value;

    switch (value) {
        case "0":
            disableElement(message);
            fireDownStreamEvent(message, validateComment);
            break;
        case "1":
            enableElement(message);
            break;
        case "2":
            disableElement(message);
            fireDownStreamEvent(message, validateComment);
            break;
        default:
            console.log(value)
    }

}

function validateComment(event) {

}

document.querySelector('#comments_name').addEventListener('input', validateInitialInputs);
document.querySelector('#comments_email').addEventListener('input', validateInitialInputs);
document.querySelector('#comments_fuel').addEventListener('change', fuelQuestion);
document.querySelector('#comments_employee').addEventListener('change', employeeQuestion);
document.querySelector('#comments_payment').addEventListener('change', paymentQuestion);
document.querySelector('#comments_returns').addEventListener('change', returnsQuestion);
document.querySelector('#comments_lost').addEventListener('change', lostQuestion);
document.querySelector('#comments_phone').addEventListener('input', phoneQuestion);
document.querySelector('#comments_store').addEventListener('change', storeQuestion);
document.querySelector('#comments_application').addEventListener('change', applicationQuestion);
document.querySelector('#comments_completed').addEventListener('change', completedQuestion);
document.querySelector('#comments_deer').addEventListener('change', deerQuestion);