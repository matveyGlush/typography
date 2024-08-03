export default function words() {
    
    const letters = "АБВГДЕЁЖЗИЙКЛМНОПРСТУХФЦЧШЦЪЫЮЯЬЭ";

    let interval = null;
    let words = [
        "ОГУЗОК", 
        "ОГРЫЗОК", 
        "ИГУАНОДОН", 
        "ДАРМОЕД", 
        "ИУДА", 
        "ОЛУХ", 
        "ДИПЛОДОК",
        "БЕЗДАРЬ",
        "РАХИТОИД",
        "КАЛЕКА",
        "ИНВАЛИД",
        "БАРАН",
        "КРЕТИН",
        "УВОЛЕН!!",
        "ХАЛДЕЙ",
    ]

    let result = document.getElementById("result")

    document.getElementById("game")?.addEventListener('click', event => {  
        let iteration = 0;
        let item = words[Math.floor(Math.random() * words.length)];
        
        clearInterval(interval);
        
        interval = setInterval(() => {
            result.innerText = item
            .split("")
            .map((_, index) => {
                if(index < iteration) {
                    return item[index];
                }
            
                return letters[Math.floor(Math.random() * 33)]
            })
            .join("");
            
            if(iteration >= item.length){ 
            clearInterval(interval);
            }
            
            iteration += 1 / 3;
        }, 30);
    })
}