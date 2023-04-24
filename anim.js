// ===========aktifitas warna tombol=======
let sections = dokument.querySelectorAll('section');
let navLink = dokument.querySelectorAll('nav ul li a');

window.onscroll = () => {
    sections.forEach(sec => {
        let top = window.scrollY;
        let offset = sec.offsetTop - 150;
        let height = sec.offsetHeight;
        let id = sec.getAttribute ('id');

        if(top >= offset && top < offset + height) {
            navLink.forEach(link => {
                link.classlist.remove ('aktif');
                document
                  .querySelector("nav ul li a [href*=" + id + "]")
                  .classList.add("aktif");
            });
        };
    });
};