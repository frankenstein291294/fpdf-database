
document.querySelectorAll('button').forEach( btn => {

    btn.addEventListener('click', async e => {

        const items =  e.target.parentNode.parentNode.querySelectorAll('td') ;

        const body = {
            name: items[0].textContent,
            description: items[1].textContent,
            img: items[2].querySelector('img').src
        }

        const data = new FormData();
        data.append('data', JSON.stringify( body ));

        const res  = await fetch('crear_pdf.php', { method:'POST', body: data });
        const file = await res.blob();

        const url = URL.createObjectURL( file );
        const a = document.createElement('a');
        a.href = url;
        a.target = '_blank';
        a.click();

    })

} )
