// const [handle] = await showOpenFilePicker();
// const file = await handle.getFile();
// const img = document.createElement('img');
// img.src = URL.createObjectURL(file);
// document.body.append(img);

document.querySelector('#catalog_picture').addEventListener('input',e=>{
    const a = URL.createObjectURL(e.target.files[0])
    const img = document.querySelector('#displayCatalog');
    img.src = a;
    img.classList.remove('hidden');
})
document.querySelector('#motive_picture').addEventListener('input',e=>{
    const a = URL.createObjectURL(e.target.files[0])
    const img = document.querySelector('#displayMotive');
    img.src = a;
    img.classList.remove('hidden');
})
document.querySelector('.getChange').addEventListener('input',e=>{
    const a = URL.createObjectURL(e.target.files[0])
    const img = document.querySelector('#catalogPictureNow');
    img.src = a;
    img.classList.remove('hidden');
})
document.querySelector('.getChangeMotive').addEventListener('input',e=>{
    const a = URL.createObjectURL(e.target.files[0])
    const img = document.querySelector('#motivePictureNow');
    img.src = a;
    img.classList.remove('hidden');
})