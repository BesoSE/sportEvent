$(document).ready(()=>{
    $('.delete_sport').click((event)=>{
       event.preventDefault();

       if(confirm('Delete Sport?')){
        const id=event.target.getAttribute('data-id');

        fetch(`/sport/deleteSport/${id}`,{
            method:"DELETE"
        }).then(res=>window.location.reload());


       }
    });

    $('.delete_liga').click((event)=>{
        event.preventDefault();
 
        if(confirm('Delete Liga?')){
         const id=event.target.getAttribute('data-id');
 
         fetch(`/sport/deleteLiga/${id}`,{
             method:"DELETE"
         }).then(res=>window.location.reload());
 
 
        }
     });

     $('.obrisi_tim').click((event)=>{
        event.preventDefault();
 
        if(confirm('Obrisi Tim?')){
         const idt=event.target.getAttribute('data-idt');
         const idl=event.target.getAttribute('data-idl');
         fetch(`/sport/obrisiTim/${idt}/izLige/${idl}`,{
             method:"DELETE"
         }).then(res=>window.location.reload());
 
 
        }
     });

     $('.add_tim_liga').click((event)=>{
        event.preventDefault();
 
        if(confirm('Add Tim?')){
         const id=event.target.getAttribute('data-id');
 
         fetch(`/sport/dodajTim/${id}`,{
             method:"POST"
         }).then(res=>window.location.reload());
 
 
        }
     });


  
     $('.obrisi_igraca_iz_lige').click((event)=>{
        event.preventDefault();
 
        
         const idi=event.target.getAttribute('data-idi');
         const idl=event.target.getAttribute('data-idl');
         if(confirm('Obrisi Igraca iz Lige?')){
         fetch(`/sport/obrisiIgraca/${idi}/IzLige/${idl}`,{
             method:"DELETE"
         }).then(res=>window.location.reload());
 
 
        }
     });



$('.obrisi_igraca_iz_tima').click((event)=>{
    event.preventDefault();
 
    if(confirm('Obrisi Igraca iz Tima?')){
     const idi=event.target.getAttribute('data-idi');
     const idl=event.target.getAttribute('data-idl');
    
     fetch(`/sport/obrisiIgraca/${idi}/IzTima/${idl}`,{
         method:"DELETE"
     }).then(res=>window.location.reload());


    }
 });

});