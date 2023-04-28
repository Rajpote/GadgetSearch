const productdetails = [...document.querySelectorAll('.product-details')];
const nxtBtn = [...document.querySelectorAll('.nxt-btn')];
const preBtn = [...document.querySelectorAll('.pre-btn')];

productdetails.forEach((item, i) => {
    let detailsDimensions = item.getBoundingClientRect();
    let detailsWidth = detailsDimensions.width;

    nxtBtn[i].addEventListener('click', () => {
        item.scrollLeft += detailsWidth;
    })

    preBtn[i].addEventListener('click', () => {
        item.scrollLeft -= detailsWidth;
    })
})