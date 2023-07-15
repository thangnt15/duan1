const sizes = document.querySelectorAll('.size');
const colors = document.querySelectorAll('.color');
const shoes = document.querySelectorAll('.shoe');
const gradients = document.querySelectorAll('.gradient');
const shoeBg = document.querySelector('.shoeBackground');

const formCart = document.getElementById('formCart');

let prevColor = "Blue";
let animationEnd = true;

document.addEventListener('DOMContentLoaded', (event) => {
    console.log(formCart);
    const input1 = formCart.querySelector('[name="size"]');
    if(input1) {
        input.setAttribute('value', "S");
        console.log(formCart);
    }else {
        input_size = document.createElement('input');
        input_size.setAttribute('type', 'hidden');
        input_size.setAttribute('name', 'size');
        input_size.setAttribute('value', "S");
        console.log(input_size);
        formCart.appendChild(input_size);
        console.log(formCart);
    }

    const input2 = formCart.querySelector('[name="color"]');
    if(input2) {
        input.setAttribute('value', "Blue");
        console.log(formCart);
    }else {
        input_color = document.createElement('input');
        input_color.setAttribute('type', 'hidden');
        input_color.setAttribute('name', 'color');
        input_color.setAttribute('value', "Blue");
        console.log(input_color);
        formCart.appendChild(input_color);
        console.log(formCart);
    }
  })

function changeSize(){
    sizes.forEach(size => size.classList.remove('active'));
    this.classList.add('active');
    console.log(this.textContent);
    const input = formCart.querySelector('[name="size"]');
    if(input) {
        input.setAttribute('value', this.textContent);
        console.log(formCart);
    }else {
        input_size = document.createElement('input');
        input_size.setAttribute('type', 'hidden');
        input_size.setAttribute('name', 'size');
        input_size.setAttribute('value', this.textContent);
        console.log(input_size);
        formCart.appendChild(input_size);
        console.log(formCart);
    }
}

function changeColor(){
    if(!animationEnd) return;
    let primary = this.getAttribute('primary');
    let color = this.getAttribute('color');
    let shoe = document.querySelector(`.shoe[color="${color}"]`);
    let gradient = document.querySelector(`.gradient[color="${color}"]`);
    let prevGradient = document.querySelector(`.gradient[color="${prevColor}"]`);

    if(color == prevColor) return;

    colors.forEach(c => c.classList.remove('active'));
    this.classList.add('active');

    document.documentElement.style.setProperty('--primary', primary);
    
    shoes.forEach(s => s.classList.remove('show'));
    shoe.classList.add('show');

    gradients.forEach(g => g.classList.remove('first', 'second'));
    gradient.classList.add('first');
    prevGradient.classList.add('second');

    prevColor = color;
    animationEnd = false;

    gradient.addEventListener('animationend', () => {
        animationEnd = true;
    })

    console.log(this.getAttribute('color'));
    const input = formCart.querySelector('[name="color"]');
    if(input) {
        input.setAttribute('value', this.getAttribute('color'));
        console.log(formCart);
    }else {
        input_color = document.createElement('input');
        input_color.setAttribute('type', 'hidden');
        input_color.setAttribute('name', 'color');
        input_color.setAttribute('value', this.getAttribute('color'));
        console.log(input_color);
        formCart.appendChild(input_color);
        console.log(formCart);
    }
}

sizes.forEach(size => size.addEventListener('click', changeSize));
colors.forEach(c => c.addEventListener('click', changeColor));

let x = window.matchMedia("(max-width: 1000px)");

function changeHeight(){
    if(x.matches){
        let shoeHeight = shoes[0].offsetHeight;
        shoeBg.style.height = `${shoeHeight * 0.9}px`;
    }
    else{
        shoeBg.style.height = "475px";
    }
}

changeHeight();

window.addEventListener('resize', changeHeight);