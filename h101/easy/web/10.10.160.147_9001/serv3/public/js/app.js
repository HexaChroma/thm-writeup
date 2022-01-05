$('.checkcode').click( function(){
    $.post('/trycode',{
        'code'  :   $('textarea[name="code"]').val()
    },function(resp){
        $('textarea[name="results"]').val( resp );
        if( resp.toLowerCase() === 'hello world' ){
            alert('You did it! Now try our next lesson');
            window.location = '/lesson/2';
        }else{
            alert('You have an error in your code!')
        }
    });
});