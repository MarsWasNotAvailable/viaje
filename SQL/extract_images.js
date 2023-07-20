[...document.getElementsByTagName('img')].forEach((EachKey)=>{

    const anchor = document.createElement('a');
    anchor.href = EachKey.src;
    anchor.download = EachKey.src.split('/').pop();

    anchor.click();

     console.log(anchor);
    
})
;
