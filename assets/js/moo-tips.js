(()=>{
    const mooTips = document.querySelectorAll('.moo-tip');
    mooTips.forEach((tip)=>{
        tip.addEventListener('click', (e)=>{
            const target = e.target;
            const tipContent = target.querySelector('.moo-tip-content');
            if(tipContent){
                tipContent.classList.toggle('active');
            }
        })
    })
})
