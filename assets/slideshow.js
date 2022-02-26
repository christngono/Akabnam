function imageGallery(){
    const highlight = document.querySelector(".gallery-highlight");
    const previews = document.querySelectorAll(".product-preview img");

    previews.forEach(preview => {
        previews.addEventListener("click", function(){
        const smallSrc= this.src;
        const bigSrc = smallSrc.replace("small", "big");
        highlight.src = bigSrc;
        previews.forEach(preview => preview.classList.remove("product-active"));
        preview.classList.add("product-active");
    
        });
    });
}
imageGallery();