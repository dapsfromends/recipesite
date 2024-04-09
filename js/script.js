const searchon = document.querySelector('#searchopen');
const searchoff = document.querySelector('#removesearch');
const searchinput = document.querySelector('.searchinput');


searchinput.style.display = "none";

searchon.addEventListener('click', () => {
    if (searchinput.style.display === 'none') {
        searchinput.style.display = 'flex';
    } else {
        searchinput, style.display = 'none';

    }
});

searchoff.addEventListener('click', () => {
    if (searchinput.style.display === 'flex') {
        searchinput.style.display = 'none';
    } else {
        searchinput.style.display = 'flex';

    }
});

//slider header

const posts = [
    {
        title: "Brownie Cookies",
        desc: "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptatum repellat sed aliquam suscipit quisquam cum!",
        link: "https://google.com/",
        bgImg: "img/ramennoodles.jpg",
        label: "Food1"
    },
    {
        title: "Caramel Cookies",
        desc: "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptatum repellat sed aliquam suscipit quisquam cum!",
        link: "https://google.com/",
        bgImg: "img/fr2.jpg",
        label: "Food2"
    },
    {
        title: "Red Cookies",
        desc: "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptatum repellat sed aliquam suscipit quisquam cum!",
        link: "https://google.com/",
        bgImg: "img/fr3.jpg",
        label: "Food3"
    },
    {
        title: "Yellow Cookies",
        desc: "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptatum repellat sed aliquam suscipit quisquam cum!",
        link: "https://google.com/",
        bgImg: "img/fr4.jpg",
        label: "Food4"
    },
    {
        title: "Blue Cookies",
        desc: "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptatum repellat sed aliquam suscipit quisquam cum!",
        link: "https://google.com/",
        bgImg: "img/fr5.jpg",
        label: "Food5"
    }
];

let currentSlide = 0;

function showSlide(slideIndex) {
    const slide = posts[slideIndex];
    document.querySelector('.headertitle').textContent = slide.title;
    document.querySelector('.headerpera').textContent = slide.desc;
    document.querySelector('.headerbtn').href = slide.link;
    document.querySelector('.headerimg').style.background = `url('${slide.bgImg}') no-repeat center center/cover`;
}

showSlide(currentSlide);

const headerPosts = document.querySelector('.headercards');


const headerPostsCards = () => {
    const updateSlider = () => {
        headerPosts.innerHTML = '';
        for (let i = currentSlide; i < currentSlide + 6; i++) {
            const post = posts[i % posts.length];
            const postElement = document.createElement('a');
            postElement.classList.add('headercard');
            postElement.classList.add('flex');
            postElement.href = `${post.link}`;
            postElement.innerHTML = `
            <img src="${post.bgImg}" alt="">
          <div class="hcardinfo">
            <span>${post.label}</span>
            <h3>${post.title}</h3>
          </div>

          `


            headerPosts.appendChild(postElement);

        }
    };

    const leftbtn = document.getElementById('sleft');
    const rightbtn = document.getElementById('sright');


    leftbtn.addEventListener('click', function () {
        currentSlide = (currentSlide - 6 + posts.length) % posts.length;
        updateSlider();
        showSlide(currentSlide);
    });

    rightbtn.addEventListener('click', function () {
        currentSlide = (currentSlide + 6) % posts.length;
        updateSlider();
        showSlide(currentSlide);
    })


    updateSlider();

};

headerPostsCards();

function nextSlide() {
    currentSlide = (currentSlide + 1) % posts.length;
    showSlide(currentSlide);
    headerPostsCards(currentSlide);
};

setInterval(nextSlide, 3000);

const mainnav = document.querySelector('.mainnav');

window.addEventListener('scroll', () => {
    if (document.documentElement.scrollTop > 2) {
        mainnav.classList.add('sticky');
    } else {
        mainnav.classList.remove('sticky');
    }
});

const darkmode = document.querySelector('#checkbox');
let body = document.body;
const logoImage = document.querySelector('.logo img');
const logoimage2 = document.querySelector('.titleicon img');


const idDarkMode = localStorage.getItem('darkMode') === 'true';

if (idDarkMode) {
    body.classList.add('dark');
    darkmode.checked = true;
    logoImage.src = '/img/favicon.png'
    logoImage.src = '/img/favicon.png'

} else {
    logoImage.src = '/img/logo2.png'
    logoImage.src = '/img/logo2.png'

}

darkmode.addEventListener('change', () => {
    if (darkmode.checked) {
        body.classList.add('dark')
        logoImage.src = '/img/favicon.png'
        logoImage.src = '/img/favicon.png'
        localStorage.setItem('darkMode', 'true')

    } else {
        body.classList.remove('dark')
        logoImage.src = '/img/logo2.png'
        logoImage.src = '/img/logo2.png'
        localStorage.setItem('darkMode', 'false');

    }
});

const navdiv = document.querySelector('.navonoff');
const navtoggle = document.querySelector('#checkbox2');
const navlist = document.querySelector('.navlist');

navtoggle.addEventListener('change', () => {
    if (navtoggle.checked) {
        navlist.style.right = '-150px'

    } else {
        navlist.style.right = '-400px'

    }
})