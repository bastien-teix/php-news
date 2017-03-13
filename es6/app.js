import * as article from "./article";
import 'whatwg-fetch';

fetch('http://localhost:8000')
	.then(function(response){
		return response.text();
	})
	.then(function(content){
		console.log(content);
	})

let suppr = Array.from(document.getElementsByClassName('btn'));
suppr.forEach(element => element.addEventListener('click', btnListener));

function btnListener(event){
	article.remove();
}

/*const name = 'toto';
alert(`Hello ${name} !`);
*/