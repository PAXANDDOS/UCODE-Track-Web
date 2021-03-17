let characters = document.getElementById("characters").children;

for (let i = 0; i < characters.length; i++) {
    let classAttr = characters[i].getAttribute("class");
    let data = characters[i].getAttribute("data-element");

    if (classAttr !== "good" && classAttr !== "evil" || !classAttr)
        characters[i].className = "unknown";
    if (!data)
        characters[i].setAttribute("data-element", "none");
    characters[i].appendChild(document.createElement("br"));

    if (characters[i].getAttribute("data-element") === "none") {
        let circle = document.createElement("div");
        let line = document.createElement("div");

        circle.setAttribute("class", `elem ${data}`);
        characters[i].appendChild(circle);
        line.setAttribute("class", "line");
        circle.appendChild(line);
    }
    else {
        data = characters[i].getAttribute("data-element").split(' ');
        for (let j = 0; j < data.length; j++) {
            let circle = document.createElement("div");

            circle.setAttribute("class", `elem ${data[j]}`);
            characters[i].appendChild(circle);
        }
    }
}
