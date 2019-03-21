/**
* Creates list element to contain all the favourite foods
* @name createList
* @return element of list
*/
const createList = () => {

    let listElement = document.createElement('ol');
    document.body.appendChild(listElement);

    return listElement;
}

/**
* Adds li element with given food to the DOM
* @name addFoodElement
* @param {String} foodName
* @param {HtmlElement} listElement
* @return element of list
*/
const addFoodElement = (foodName, listElement) => {
    let textNode = document.createTextNode(foodName);
    let liElement = document.createElement('li');
    liElement.appendChild(textNode);
    listElement.appendChild(liElement);
}

const loadHandler = (foods) => {

    const listElement = createList();

    let foodElements = [];
    foods.forEach(foodName => {
        addFoodElement(foodName, listElement);
    });
}

window.addEventListener('load', () => {
    fetch('file.php').then(response => 
        response.json()
    ).then(foods => {
        loadHandler(foods);
    });
});
