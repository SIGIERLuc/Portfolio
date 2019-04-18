

function projectCreation(title, description, img, link, array) {
    var element = {
        id: '_' + Math.random().toString(36).substr(2, 9),
        title: title,
        description: description,
        img: img,
        link: link
    }
    if (!array[element.id]) {
        array[element.id] = element;
    }

}
var allProject = {};

projectCreation("Projet1", "Ceci est mon premier projet", "../img/jsthumb.png", "https://www.google.com", allProject);
projectCreation("Projet2", "Ceci est mon deuxième projet", "../img/jsthumb.png", "https://www.google.com", allProject);
projectCreation("Projet3", "Ceci est mon troisième projet", "../img/jsthumb.png", "https://www.google.com", allProject);


