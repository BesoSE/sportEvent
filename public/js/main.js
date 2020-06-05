$(document).ready(()=>{
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