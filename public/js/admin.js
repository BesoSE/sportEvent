$(document).ready(()=>{
    $('.delete_admin').click((event)=>{
       event.preventDefault();

       if(confirm('Delete Admin?')){
        const id=event.target.getAttribute('data-id');

        fetch(`/sport/deleteAdmin/${id}`,{
            method:"POST"
        }).then(res=>window.location.reload());


       }
    });

    $('.add_admin').click((event)=>{
        event.preventDefault();
 
        if(confirm('Add Admin?')){
         const id=event.target.getAttribute('data-id');
 
         fetch(`/sport/addAdmin/${id}`,{
             method:"POST"
         }).then(res=>window.location.reload());
 
 
        }
     });

     $('.delete_editor').click((event)=>{
        event.preventDefault();
 
        if(confirm('Delete Editor?')){
         const id=event.target.getAttribute('data-id');
 
         fetch(`/sport/deleteEditor/${id}`,{
             method:"POST"
         }).then(res=>window.location.reload());
 
 
        }
     });
 
     $('.add_editor').click((event)=>{
         event.preventDefault();
  
         if(confirm('Add Editor?')){
          const id=event.target.getAttribute('data-id');
  
          fetch(`/sport/addEditor/${id}`,{
              method:"POST"
          }).then(res=>window.location.reload());
  
  
         }
      });


      $('.delete_delegat').click((event)=>{
        event.preventDefault();
 
        if(confirm('Delete Delegat?')){
         const id=event.target.getAttribute('data-id');
 
         fetch(`/sport/deleteDelegat/${id}`,{
             method:"POST"
         }).then(res=>window.location.reload());
 
 
        }
     });
 
     $('.add_delegat').click((event)=>{
         event.preventDefault();
  
         if(confirm('Add Delegat?')){
          const id=event.target.getAttribute('data-id');
  
          fetch(`/sport/addDelegat/${id}`,{
              method:"POST"
          }).then(res=>window.location.reload());
  
  
         }
      });



      $('.delete_radnik').click((event)=>{
        event.preventDefault();
 
        if(confirm('Delete Radnik?')){
         const id=event.target.getAttribute('data-id');
 
         fetch(`/sport/deleteRadnik/${id}`,{
             method:"POST"
         }).then(res=>window.location.reload());
 
 
        }
     });
 
     $('.add_radnik').click((event)=>{
         event.preventDefault();
  
         if(confirm('Add Radnik?')){
          const id=event.target.getAttribute('data-id');
  
          fetch(`/sport/addRadnik/${id}`,{
              method:"POST"
          }).then(res=>window.location.reload());
  
  
         }
      });

 });