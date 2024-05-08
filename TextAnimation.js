function GetClassName(classname1,classname2)
{
   
    function JeVOknu(element) {
        const rect = element.getBoundingClientRect();
        return (
            rect.top >= 0 &&
            rect.left >= 0 &&
            rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
            rect.right <= (window.innerWidth || document.documentElement.clientWidth)
        );
    }
    
    
    function PreglajAlijeVOknu() {
        const besedilo = document.querySelector(classname1);
        const besedilo2 = document.querySelector(classname2);
    
         if (JeVOknu(besedilo)) {
                
            besedilo.classList.add('animated');
            besedilo2.classList.add("animatedChips");
        }
    
        
      
       
          
            
        
    }
    
    
    PreglajAlijeVOknu();
    
    window.addEventListener('scroll', PreglajAlijeVOknu); // vsakic ko uporabnik scrolla preveri ce je element v viden za uporbnika ali ne
}

