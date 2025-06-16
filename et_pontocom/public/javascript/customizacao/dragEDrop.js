const imagens = document.querySelectorAll(".imagemProdutoWrapper")
const containers = document.querySelectorAll(".produtoContainer")

function dragStart(e) {
    selected = this;
    e.dataTransfer.setDragImage(selected, 129, 129)
    parentOfFill = selected.parentNode;
    this.className += " hold";
    setTimeout(() => {
    return (this.style.opacity = "0.6");
    }, 0);
}

function dragOver(e) {
    e.preventDefault();
    if (!this.className.includes("hovered")) {
        this.className += " hovered";
    }
}

function dragEnter(e) {
    e.preventDefault();
    
    if (this.querySelector(".imagemProdutoWrapper") !== null) {
        doesExist = true;
        const elements = this.querySelectorAll(".imagemProdutoWrapper");
        swapElement = elements[0];
    } else {
        doesExist = false;
    }
}

function dragLeave() {
    this.className = "produtoContainer";
}

function dragDrop() {
    this.className = "produtoContainer";
    selected.style.opacity = "1";
    if (doesExist) {
        parentOfFill.append(swapElement);
    }
    this.append(selected);
}

function dragEnd() {
    this.className = "imagemProdutoWrapper";
    if (selected.style.opacity === "0.6") {
        selected.style.opacity = "1";
    }
}

imagens.forEach(element => {
    element.addEventListener("dragstart", dragStart);
    element.addEventListener("dragend", dragEnd);
});

containers.forEach(element => {
    element.addEventListener("dragover", dragOver);
    element.addEventListener("dragenter", dragEnter);
    element.addEventListener("dragleave", dragLeave);
    element.addEventListener("drop", dragDrop);
})