let starty=null;
let endy=null;
let root = document.querySelector('[sort-root]')
root.querySelectorAll('[sort-item]').forEach(el=>{
	el.addEventListener('dragstart',e=>{
		e.target.setAttribute('draggin',true)
		starty = e.pageY;
		e.target.classList.remove('fonta')
		// console.log(starty)
		
	})	
	el.addEventListener('drop',e=>{
		e.target.classList.remove('dragyellow')
		
		let srcEl = root.querySelector('[draggin]');
	
		let destid = e.target.id;		

		endy = e.pageY;
		// console.log(endy)


		if(starty>endy){
			e.target.before(srcEl)
			// console.log('moved up')
		} else {
			e.target.after(srcEl)
			// console.log('moved down')
		}	

		let component = Livewire.find(e.target.closest('[wire\\:id]').getAttribute('wire:id'))
		
		let taskIds = Array.from(root.querySelectorAll('[sort-item]').map((it)=>{
			it.getAttribute('sort-item');
		}))

		component.call('updateTaskOrder',taskIds)

		

	})	
	el.addEventListener('dragenter',e=>{		
		e.target.classList.add('dragyellow')
		
		// e.target.style.backgroundColor='yellow'
		
		e.preventDefault();
		
	})
	el.addEventListener('dragover',e=>{		
		
		e.preventDefault();
		
	})
	el.addEventListener('dragleave',e=>{
		e.target.classList.remove('dragyellow')	
		

		
	})
	el.addEventListener('dragend',e=>{
		e.target.removeAttribute('draggin')
		e.target.classList.add('fonta')
		// e.target.style.fontSize='30px'
		
	})
});

document.addEventListener('dragstart',()=>{
	removefonta()
})


function getdom(src,dest)
{
	let newdom = [];
	let position=null;
	let root1 = document.querySelector('[sort-root]')
	root1.querySelectorAll('[sort-item]').forEach(el=>{	
		newdom.push(el.id);	
		
	})	
	return newdom;
}

function removefonta()
{	
	let root1 = document.querySelector('[sort-root]')
	root1.querySelectorAll('[sort-item]').forEach(el=>{	
		el.classList.remove('fonta')
		
	})		
}


// change debit and credit account heads in edit journal entry

