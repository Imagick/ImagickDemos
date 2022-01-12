export function setupCategorySelect() {
    let category_select_elements = document.getElementsByClassName("category_select");

    let callback = function (event: Event) {
        let target = event.target;
        // @ts-ignore: blah blah
        window.location = target.options[target.selectedIndex].value;
    };

    for (let i = 0; i < category_select_elements.length; i++) {
        category_select_elements[i].addEventListener('change', callback);
    }
}

export function setupExampleSelect() {
    let example_select_elements = document.getElementsByClassName("example_select");

    let callback = function (event: Event) {
        let target = event.target;
        // @ts-ignore: blah blah
        window.location = target.options[target.selectedIndex].value;
    };

    for (let i = 0; i < example_select_elements.length; i++) {
        example_select_elements[i].addEventListener('change', callback);
    }
}