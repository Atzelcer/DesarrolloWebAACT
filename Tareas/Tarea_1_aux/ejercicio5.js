const pantallaInf = document.querySelector('.inferior');
const pantallaSup = document.querySelector('.superior');


let valor1 = null;
let valor2 = null;
let operacion = null;

document.querySelectorAll('.numero').forEach(btn => {
  btn.addEventListener('click', () => {
    // evitar dos puntos
    if (btn.innerText === '.' && pantallaInf.innerText.includes('.')) return;
    pantallaInf.innerText += btn.innerText;
  });
});

document.querySelectorAll('.operacion').forEach(btn => {
  btn.addEventListener('click', () => {
    if (pantallaInf.innerText === '') return;
    if (valor1 !== null && operacion !== null) {
      calcular();
    }
    valor1 = parseFloat(pantallaInf.innerText);
    operacion = btn.innerText;
    // mostrar inmediatamente "valor1 operador"
    pantallaSup.innerText = `${valor1} ${operacion}`;
    pantallaInf.innerText = '';
  });
});


document.getElementById('igual').addEventListener('click', () => {
  if (operacion === null || pantallaInf.innerText === '') return;
  valor2 = parseFloat(pantallaInf.innerText);
  pantallaSup.innerText = `${valor1} ${operacion} ${valor2}`;
  calcular();
});


function calcular() {
  let res;
  switch (operacion) {
    case '+': res = valor1 + valor2; break;
    case '-': res = valor1 - valor2; break;
    case '*': res = valor1 * valor2; break;
    case '/': res = valor1 / valor2; break;
    case '^': res = Math.pow(valor1, valor2); break;
    default: return;
  }
  pantallaInf.innerText = res;
  valor1 = res;
  operacion = null;
}


document.getElementById('all-clear').addEventListener('click', () => {
  pantallaInf.innerText = '';
  pantallaSup.innerText = '';
  valor1 = valor2 = operacion = null;
});
document.getElementById('delete').addEventListener('click', () => {
  pantallaInf.innerText = pantallaInf.innerText.slice(0, -1);
});


function factorial(n) {
  if (!Number.isInteger(n) || n < 0) return NaN;
  let f = 1;
  for (let i = 1; i <= n; i++) f *= i;
  return f;
}

document.querySelectorAll('.operacion-unaria').forEach(btn => {
  btn.addEventListener('click', () => {
    if (pantallaInf.innerText === '') return;
    const curr = parseFloat(pantallaInf.innerText);
    let res;
    switch (btn.innerText) {
      case '√':
        res = Math.sqrt(curr);
        pantallaSup.innerText = `√(${curr})`;
        break;
      case 'log':
        res = Math.log10(curr);
        pantallaSup.innerText = `log(${curr})`;
        break;
      case '!':
        res = factorial(curr);
        pantallaSup.innerText = `${curr}!`;
        break;
      default:
        return;
    }
    pantallaInf.innerText = res;
    valor1 = res;
    operacion = null;
  });
});
