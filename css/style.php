<style>
@tailwind base;
@tailwind components;
@tailwind utilities;
/* fonts */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'poppins';
}
.my-nav{
  display: flex;
  justify-content: space-between;
  width: 100%;
  padding: 10px 10px;
  padding-bottom: 20px;
  /* background: #f8f9fa; */

  /* background:  #84b04b; */
  /* background:  #ffb703; */
  /* background:#1A544D;
  background: #389187; */
  /* background: #23857A; */
  /* background-color: #c1121f; */
  /* background-color: #fb5607; */
  /* background-color: #4f772d; */
  /* background-image: url(/images/slider3.webp); */
  background-color: #15616d;
  /* object-fit: contain; */
}
.my-nav .acc a,.acc-re-lo,.acc-ti,.wishlist i,.wishlist-counter,.cart-counter,.cart i{
  color: white;
}

.nav-bar .nav-logo{
  width: 30%;
  padding: 0 55px;
}
.nav-search{
  display: flex;
  justify-content: space-evenly;
  align-items: center;
  border-radius: 5px;
  width:45%;
  padding: 0 45px;
}
 .nav-search .glass{
  font-size: 1.2rem;
  /* padding-top: 2px; */
  background: white;
  padding: 8px 10px;
 border: 1px solid #ced4da;
}
.nav-input{
  border-top-left-radius: 8px;
  border-bottom-left-radius: 8px;
}
.glass{
  border-top-right-radius: 8px;
  border-bottom-right-radius: 8px;
  cursor:pointer;

}

.acc-desk{
  display: flex;
  width: 11%;
  justify-content: space-between;
  align-items: center;
  gap: 5px;
}
.acc-desk a{
  /* color: #6F6F6F; */
  color: #333333;
  
}
.acc .acc-ti{
  font-size: 1rem;
  font-family:'poppins';
  font-weight: 500;
  /* color: #f5ab1e; */
}
.acc-desk .acc-re-lo{
  font-size: 12px;
  font-weight: 400;
  
}
.cart{
  display: flex;
  width: 5%;
  align-items: center;
  padding: 4px 4px;
  
}




/* nav2 */
.my-nav2 {
  display: flex;
  width: 100%;
  align-items: center;
  padding: 5px 4px;
  background: #F0F8FF;
}

.my-nav2 .nav-link {
  font-family: 'Poppins', sans-serif;
  font-weight: 400;
  font-size: 1.2rem;
  margin: 0 5px;
  border-right: 1px solid #ced4da;
}

.my-nav2 .navbar-nav.nav-line {
  padding-right: 1.5rem;
}

.my-nav2 .nav-items {
  flex-grow: 1;
}

.my-nav2 .drop-mn {
  position: absolute;
  top: 118%;
  background-size: cover;
  border-radius: .25rem;
  border-bottom-left-radius: 20px;
  border-bottom-right-radius: 20px;
  min-width: 370px;
  min-height: 425px;
  line-height: 33px;
  text-align: center;
  color: #212529;
  background-clip: padding-box;
}

.dropdown-item:focus,
.dropdown-item:hover {
  background-color: transparent;
  color: #ffb703;
  font-weight: 600;
  transition: text 0.5s ease-in 0.1s;
}

.wishlist {
  display: flex;
  width: auto;
  align-items: center;
  padding: 4px 4px;
}

.wishlist .fa-heart,
.fa-bag-shopping {
  font-size: 30px;
  color: #ffb703;
}

.wishlist a {
  color: #fff;
}

.wishlist-counter::before {
  font-size: 10px;
}




/* nav section end */

.btn-open-cart {
  font-size: 16px;
  padding: 10px 20px;
  /* background-color: #006d77; */
  background-color: #15616d;
  color: white;
  border: none;
  cursor: pointer;
  position: absolute;
  top: 20px;
  right: 20px;
}

/* Sidebar styling */
.cart-sidebar {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1000;
  top: 0;
  right: 0;
  background-color: white;
  overflow-x: hidden;
  transition: 0.5s;
  box-shadow: -2px 0 5px rgba(0, 0, 0, 0.5);
}

.cart-header {
  padding: 16px;
  background-color: #006d77;
  color: white;
}

.cart-header h2 {
  margin: 0;
}

.closebtn {
  position: absolute;
  top: 10px;
  right: 25px;
  font-size: 36px;
  cursor: pointer;
}

.cart-content {
  padding: 16px;
}

.cart-footer {
  padding: 16px;
  background-color: #f1f1f1;
}

.btn-checkout {
  width: 100%;
  padding: 10px;
  background-color: #81c408;
  color: white;
  border: none;
  cursor: pointer;
}
/* Responsive grid and spacing */
.cart-detail {
    border-bottom: 1px solid #ddd;
    padding: 10px 0;
    margin-bottom: 10px;
}

.cart-detail-img img {
    max-width: 100%;
    height: auto;
}

.cart-detail-product p {
    margin: 0;
    font-size: 1rem;
    font-weight: bold;
}

.cart-detail-product .price {
    display: block;
    font-size: 0.9rem;
    color: #006d77;
}

.cart-detail-product .count {
    font-size: 0.85rem;
    color: #555;
}

@media (max-width: 767px) {
    .cart-detail {
        flex-direction: column;
    }

    .cart-detail-img, .cart-detail-product {
        text-align: center;
        padding: 5px 0;
    }
}

/* Responsive */
@media (max-width: 600px) {
  .cart-sidebar {
    width: 100%;
  }
}
/* sidebar section end */
/* slider section */
 .slide .hero_section img{
object-fit: cover;
max-height: 440px; 
background-size: contain;
}


/* Text animation */
.img-container img{
  width: 100%;
  height:475px ;
}
.text-container{
  width: 100%;
  position: absolute;
  top: 35%;
  /* border: 2px solid; */
  height: 250px;
  text-align: center;
  display: flex;
  justify-content: start;
  flex-direction: column;
  /* align-items: start; */
}


.text-container .banner_title{
  width: 73%;
  padding: 10px 0;
  margin-left: -8%;
  
}
.banner_title h1 {
    color: #333333;
    font-weight: 600;
    font-size: 3rem;
}

.banner_title .first {
    color: #333333;
    font-weight: 100;
}
/* -------------------- */

@import url(https://fonts.googleapis.com/css?family=Open+Sans:600);


.animation-text {
  position: absolute;
  width: 95%;
  left: -28%;
  /* margin-left: -602px; */
  height: 90px;
  top: 32%;
  font-size:2.5rem;
  font-weight:600;
  /* margin-top: -20px; */

}

p {
  display: inline-block;
  vertical-align: top;
  margin: 0;
}

.word {
  position: absolute;
  width: 275px;
  opacity: 0;
}

.letter {
  display: inline-block;
  position: relative;
  /* float: left; */
  transform: translateZ(25px);
  transform-origin: 50% 50% 25px;
}

.letter.out {
  transform: rotateX(90deg);
  transition: transform 0.32s cubic-bezier(0.55, 0.055, 0.675, 0.19);
}

.letter.behind {
  transform: rotateX(-90deg);
}

.letter.in {
  transform: rotateX(0deg);
  transition: transform 0.38s cubic-bezier(0.175, 0.885, 0.32, 1.275);
}

.wisteria {
  color: #8e44ad;
}

.belize {
  color: #2980b9;
}

.pomegranate {
  color: #c0392b;
}

.green {
    color: #81c408;
}

.midnight {
  color: #16a085;
}
/* banner section */
.banner-container{
  /* position: relative; */
  width: 100%;
  /* border: 2px solid; */
  height: auto;  
  padding: 5px 5px;
}
.banner-container .row{
  width: 100%;
  height: 350px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 15px 30px;
  gap: 20px;
  flex-wrap: wrap;
  /* border: 2px solid; */

}
.row img{
  object-fit: cover;
  max-width: 100%;
  transform: scale(1);
  -moz-transform: scale(1);
  -ms-transform: scale(1);
  -o-transform: scale(1);
  -webkit-transition: all 0.35s;
  -moz-transition: all 0.35s;
  -o-transition: all 0.35s;
  transition: all 0.35s;
 
}
.row .first,.row .fourth{
  width: 36%;
}
.row .second,.row .third{
  width:60%;
}
.first,.second,.third,.fourth{
  background-clip: border-box;
  overflow: hidden;
}
 .first img:hover ,.second  img:hover,
 .third img:hover,
 .fourth img:hover{
  transform: scale(1.1);
  /* transform:  matrix(1, 0, 0, 1); */
}
/* top selling section */
#about{
  background-color: #F0F8FF;
}
.selling-container{
  width: 100%;
  /* border: 2px groove; */
  height: auto;
  padding: 5px 35px;
}
.selling-container .heading{
  font-size: 2rem;
  text-transform: uppercase;
  font-weight: 500;
  padding: 5px 5px;
  text-align: center;
  font-family: 'poppins';
}

.new-arr,.today-offer{
  /* border: 1px solid; */
  padding: 5px 10px;
  width: 100%;
  height: auto;
  display: flex;
  flex-direction: column;
  /* display: block; */
  flex-wrap: wrap;
}

.items-container .headings{
  display: flex;
  width: 100%;
  justify-content: space-between;
  /* border: 2px solid; */
  gap: 5px;
}


.new-arr .head-text,.today-offer .head-text{
  padding:20px 30px;
  
}

.new-arr .card-section {
  display: flex;
  justify-content:space-between;
  width: 98%;
  padding-top: 10px;
  margin-top: 1rem;
  flex-wrap:wrap;
  gap:20px;
}
.today-offer .card-section{
  display: flex;
  justify-content:space-between;
  width: 98%;
  padding-top: 10px;
  margin-top: 1rem;
  flex-wrap:wrap;
  gap:20px;
  /* display: none; */
}
.card-section .card{
  border-top-left-radius: 0.5rem;
  box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);
  -webkit-tap-highlight-color: rgba(0,0,0,0.025);
  /* background-color: #e6f3cf; */
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.card-section .card .h-flow{
  width: 22%;
  padding: 0.5rem 0.625rem;
  border-radius: 0.25rem 0px;
  /* --bg-opacity:1; */
  /* background-color: rgba(71,111,0,var(--bg-opacity)); */
  background-color: #DA2E1F;
    font-size: 0.625rem;
    line-height: 1rem;
    font-weight: 600;
    /* display: block; */
    --text-opacity: 1;
    color: rgba(255, 255, 255, var(--text-opacity));
    text-transform: uppercase;
}
.card-section .card-body{
display: flex;
justify-content: center;
align-items: center;
flex-direction: column;
padding: 5px 2px;
  padding-bottom: 0.8rem;
 /* background-color: #e6f3cf; */
 /* background-color: lightgoldenrodyellow; */
 /* background-color: rgb(223, 249, 194); */
}

/* .dropdown .menu{
  display: flex;
  justify-content: space-between;
  align-items: center;
  height: auto;
  font-size: .8rem;
  font-weight: 600;
  width: 15rem;
  height: 1.5rem;
  color: rgba(96,96,96
  );
  background-color: rgba(255,255,255);
} */
.card-section .card-body .card-title{
  align-self: self-start;
  padding: 3px 27px;
  font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
  font-weight: 400;
}
.card-section .price{
  display: flex;
  justify-content: start;
  gap:5px;
  width: 100%;
  padding: 10px 30px;
}
.card-section .price .fst{
font-size: 1.5rem;
  color:rgba(32,32,32);
font-weight: 500;
}
.card-section .price .snd ,.d-item .snd{
font-size: 0.8rem;
text-decoration: line-through;
  color: (128,128,128);

}
.card-section .add-cart{
display: flex;
justify-content: space-between;
align-items: center;
width: 77%;
}
.add-cart .fav{
  border:1px solid lightslategray;
  border-radius: 0.25rem;
  /* padding: 5px 6px; */
}
.card-section .dropdown-menu{
  margin-left: 25px;
  width: 90%;
  background-color: #F0F8FF;
}
 .d-item a{
  border-bottom:1px solid lightgray;
  padding: 3px 5px;
  font-size: 0.8rem;
}
.card-section .card-img-top{
  height: 13rem;
}

/* button hover effect */
*,
*:before,
*:after{
  box-sizing: border-box;
}
 .card-section .wrapper{
   /* position: fixed;  */
   /* top: 50%;
  left: 50%;  */
  transform: translate(-1%, -15%);
}
.card-section .add-cart .btn-hov,.checkout .btn-hov{
  display: flex;
  justify-content:space-between;
  justify-content:center;
  align-items:center;
  width: 70%;
  padding:.375rem .75rem;
  /* height: 50px; */
  line-height: 1.5;
  text-decoration: none;
  border-radius: .25rem;
  border: 2px solid seagreen;
  color: seagreen;
  font-size: 1rem;
  font-family: arial;
  position: relative;
  overflow: hidden;
  background: transparent;
  text-transform: uppercase;
  transition: all .35s;
}
.card-section .add-cart .btn-hov:before,
.card-section .add-cart .btn-hov:after,
 .checkout .btn-hov:before,
.checkout  .btn-hov:after{
  position: absolute;
  content: "";
  width: 100%;
  height: 100%;
  top: -100%;
  left: 0;
  background: seagreen;
  z-index: -1;
  transition: all .35s;
}
.card-section .add-cart .btn-hov:after,
.checkout .btn-hov:after{
  opacity:.5;
}
.card-section .add-cart .btn-hov:before,
.checkout .btn-hov:before{
  transition-delay: .2s;
}
.card-section .add-cart .btn-hov:hover,
.checkout .btn-hov:hover{
  color:#fff;
}

 .add-cart .btn-hov:hover:before,
 .add-cart .btn-hov:hover:after{
  top: 0;
}
.card-section .card-hov:hover{ 
            transform: scale(1.05);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        
}
/* About section */
.about-section{
  /* border: 2px solid; */
  width: 100%;
  padding:1rem 2rem;
}
.about-section .container{
  /* border: 1px solid orange; */
  width: 100%;
  padding: 20px 10px;
}
  .section-title {
  display: flex;
  justify-content: center;
  align-items: center;
  width: 100%;
  /* border: 2px solid; */
  font-weight: 500;
  padding-bottom: 2rem;

 } 
 .row2{
  width: 100%;
  /* border: 1px solid; */
 }


.about-img .img-box img{
  width: 100%;
}
.about-text h3{
  text-transform: capitalize;
  font-size: 20px;
  /* margin:20px 0; */
}

.about-tabs{
  display: flex;
  justify-content: space-around;
  width: 100%;
  /* border-bottom: 1px solid; */
  border: 1px solid  #7cc000;
}
.about-tabs .tab-item{
padding: 2px 0;
width: 50%;
background-color: transparent;
border: none;
text-transform: capitalize;
display: inline-block;
/* color: var(--blue-dark); */
font-size: 1.5rem;
cursor: pointer;
font-weight: 500;
margin: 0 30px 0 0;
position: relative;
/* opacity: 1; */
transition: all 0.3s ease;
}
.about-tabs .tab-item:last-child{
margin: 0;   
}

.about-tabs .tab-item.active{
  /* background-color: #ffb703; */
  background-color: #7cc000;
  cursor:auto;
}
.about-text .timeline-item:last-child{
  margin-bottom: 0;
}
.about-text .timeline{
  position: relative;
}

.about-text .tab-content{
  /* padding: 40px 0; */
  display: none;
}
.about-text .tab-content.active{
  display: block;
}

/* bag-section */
.full-container{
  width: 100%;
  /* height: 800px; */
  display: flex;
  background: url(images/bag-img.png);
  padding-top:20px ; 
}
.full-container .left-bag{
  width: 50%;
  padding: 5px 10px;
}
.left-bag img{
  max-width: 100%;
  min-height: 100%;
  object-fit: cover;
  -webkit-animation: mover 2s ease-in-out infinite  alternate ;
  animation: mover 2s ease-in-out infinite  alternate;
}
@-webkit-keyframes mover {
  0% { transform: translateY(0); }
  100% { transform: translateY(-20px); }
}
@keyframes mover {
  0% { transform: translateY(0); }
  100% { transform: translateY(-20px); }
}
.right-text{
  width: 50%;
  display: flex;
  justify-content: start;
  padding: 45px 0px;
  flex-direction: column;
}
.text-box #sm-head{
    color: #7cc000;
    font-size: 1rem;
    font-weight: 500;
}
.text-box i{
  font-size: 0.7rem;
  color: #7cc000;

}
.ani-text{
  position: relative;
/* display: inline-block; */
  display: flex;
  flex-direction: column;
  width: 100%;
  font-size: 2rem;
  /* margin-top: 2rem; */
}
.ani-text h2{
  line-height: 4rem;
  color: #333333;
  font-weight: 600;
  font-size: 3rem;
}
.right-text p{
  padding-top: 1rem;
text-align: justify;
line-height: 2.2rem;
}
.icons{
  display: flex;
  width: 100%;
  justify-content: space-evenly;
  align-items: center;
  /* padding: 10px 10px; */
  margin-top: 5rem;
}
.icons span{
  font-size: 1.2rem;
  font-weight: 500;
  display: inline-block;
  width: 50%;
  padding: 3px 10px;
}
.icons .circle{
  height: 80px;
  display: inline-block;
  width: 80px;
  background-color: #fff;
  border-radius: 50%;
  text-align: center;
  line-height: 5rem;
}
/* button hover effect and style */

.b-btn{
  color: black;  
  width: 28%;
  text-transform: uppercase;
  font: bold 16px 'Bitter', sans-serif; 
  line-height: 1.5;
position: relative;
  cursor: pointer;
  overflow: hidden;
  background: #7cc000;
    letter-spacing: 2px;
    padding: 10px 20px 11px;
    border: 2px solid seagreen;
    z-index: 1;
    -webkit-transition: all 0.5s ease;
    transition: all 0.5s ease;
    border-radius: 30px;
    font-weight: 600;
    margin:4rem 4rem;
 
}

/* //// Default effect: Slide from Top  //// */

.b-btn:before,
.b-btn:after{
  content: '';
  position: absolute;
  left: 0;
  top: 0;
  right: 0;
  bottom: 0;
  height: 100%;
  background: #259f6c; /* onhover background color */
  z-index: -1;
  transform: translate3D(0,-100%,0); /* move elements above button so they don't appear initially */
  transition: all .5s;
}

.b-btn:before{
  background: #fafcd6; /* button default background color */
  z-index: -2;
  transform: translate3D(0,0,0);
}

.b-btn:hover{
  color: white;
}

.b-btn:hover:after{
  transform: translate3D(0,0,0);
  transition: all .5s;
}
.b-btn:after{
  top: 0;
  z-index: -1;
  transform: translate3D(-101%,0,0);
}

.b-btn:hover:after{
  transform: translate3D(0,0,0);
  transition: all .5s;
}

/* service section start*/
.service{
  /* border: 1px solid; */
  width: 100%;
  display: flex;
  justify-content: space-evenly;
  align-items: center;
  /* padding-top:5rem ; */
  height: 300px;
  background:url('images/bag-img.png');
}
.service h6{
  /* font-size: 1.5rem; */
 color:  #191919;
 font-weight: 700;
}
.service span{
  font-size: 0.8rem;
}
.item1,.item2,.item3,.item4{
  width: 25%;
  display: flex;
  align-items: center;
  justify-content: space-evenly;
}

.service .leftitem{
  height: 5rem;
  width: 5rem;
  border-radius: 50%;
  background-color: #ebebeb;
  display: flex;
  justify-content: center;
  align-items: center;
}

.leftitem i{
  color: #81c408;
  font-size:1.8rem;
}
/* service section end*/

/* footer section start*/
.footer{
  width: 100%;
  /* height: 500px; */
  display: flex;
  flex-direction: column;
  /* justify-content: space-evenly; */
  /* border: 1px solid; */
  padding-top: 2rem;
  padding-left: 0.6rem;
  padding-right: 0.6rem;
  background-color: #15616d;
  color: #fff;
}
.footer h6{
  font-size: 1.2rem;
  font-weight: 700;
}
.footer .f-row1{
  width: 100%;
display: flex;
justify-content: center;
align-items: center;
padding-bottom: 1rem;
}
.footer .f-row2{
  width: 100%;
  display: flex;
  justify-content: space-evenly;
  padding-top: 1rem;
}
.footer .col_1,.col_2,.col_3,.col_4{
  display: flex;
  justify-content: space-between;
  align-items:start;
  flex-direction: column;
  width: 25%;
  padding: 15px 15px;
  gap: 10px;
  border: 1px solid #ced4da;
}

.footer .col_1{
  padding: 15px 32px;
}
.footer .col_1,.col_2{
  width:35%;
}

.footer .col_2 li{
   list-style: none;
}
.col_2 i{
  font-size: 1.5rem;
}
.footer .col_3 li::marker,.col_4 li::marker{
  /* color: #15616d; */
  color: #fff;
}

.f-row3{
  display: flex;
  width: 100%;
  align-items: center;
  justify-content: center;
  word-spacing: 5px;
  font-weight: 600;
  height:4rem;
  color: #fff;
  background-color: #15616d;
}
/* footer section end */
/* RegisterForm section start */

.full-con{
  /* background:url(images/regist_bg.jpeg);
  background-repeat:no-repeat; */
  width: 100%;
  height:100vh !important;
  padding: 1rem 1rem;
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
      }
.full-con .row-1 h3{
  font-weight: 500;
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  color: #ffb703;
}
.full-con .row-2{
  border: 1px solid lightgray;
  display: flex;
  width: 45%;
  /* height: 500px; */
  justify-content:center;
  /* align-items: center; */
  flex-direction: column;
  padding: 1rem .8rem;
  box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);
  
}
.full-con .row-2 .form-container{
  display:flex;
  width: 100%;
  /* height: auto; */
  flex-direction: column;
  justify-content: center;
  padding: 1rem .8rem;


}
.full-con .p_hd{
  font-size: 2rem;
  font-weight: 500;
  /* align-self:self-start; */
  /* padding-left: 8rem; */
}
.full-con .form-container input{
  margin-top: 1rem;
}
.form-container .btnn{
text-transform: uppercase;
text-decoration: none;
transition: all 0.4s ease 0s;
}
.form-container .btnn:hover{
  color: #ffffff !important;
background: #f6b93b;
border-color: #f6b93b !important;
transition: all 0.4s ease 0s;
}
/* register page pop up */

.notify{  
  position:absolute;
  top:0px;
  width:100%;
  height:0;  
  box-sizing:border-box;
  color:white;  
  text-align:center;
  background:rgba(0,0,0,.6);
  overflow:hidden;
  box-sizing:border-box;
  transition:height .2s;
}

#notifyType:before{
  display:block;
  margin-top:15px; 
  
}

/* RegisterForm section end */

/* Login section start */

.login-full-con{
  height: 100%!important;
  width: 100%;
}
.login-full-con .login-row-2{
  height:65%;
  justify-content: space-evenly;
     margin-top:1rem;
  margin-bottom:3rem;
}

.login-full-con .login-row-3{
  display:flex;
  justify-content:center;
  align-items:center;
  width:100%;
  padding-top:1rem;
  flex-direction:column;
}
.login-row-3 h5{
  text-transform:uppercase;
}
/* Login section end */


/* vegetables & Fruits section start*/
.main{
  display: flex;
  justify-content: center;
  align-items: center;
  width: 100%;
  border: 2px solid;
  gap: 10px;
  padding: 1rem 1rem;
  height: 700px;
}
.main .left{
  border: 1px solid gray;
  width: 25%;
  height:600px;
  justify-self: flex-start;
  /* padding: 5px 5px; */
}
.main .left .heading{
  text-align: center;
  padding: 5px 2px;
  background-color: #ebebeb;
}
.main .v-hd{
  padding: 2px 0;
  font-size: 1rem;
  margin-left: -8px;
}
.main .lists{
  display: flex;
  flex-direction: column;
  width: 100%;
  justify-content: center;
  align-items: start;
  flex-wrap: wrap;
  margin-left: 1rem;
  padding: 10px 10px;
}
.main .v-hd i{
  color: #ffb703;
}
.main .left li {
  list-style: none;
  padding: 3px 2rem;
  font-size: 0.8rem;
  line-height:2rem;
}
.main .left li a{
  color: grey;
}
.main .left li a:hover{
  color: #ffb703;
  font-weight: 400;
  transition: text 0.5s ease-in 0.1s;
  text-decoration:none;
}

.main .right{
  display: flex;
  justify-content: center;
  align-items: center;
  border: 1px solid grey;
  width: 75%;
  height:600px;
  background-color:#F0F8FF;
  }
  .main .right .card-section{
    display:flex;
    width: 100%;
    height:100%;
    flex-wrap:wrap;
    justify-content: space-between;
    align-items: center;
  padding:12px 12px;
  margin-top:0px;
  padding-top:0px;

}
/* vegetables & Fruits section  end*/

/* view product section start */
.product_main{
  display:flex;
  justify-content:center;
  margin:1rem 0.3rem;
  /* border:1.5px solid #e5e5e5; */
  align-items:center;
  width: 100%;
  height:auto;
  /* padding:20px 10px; */

}
.sub-con{
  display:flex;
  width: 100%;
  flex-direction:column;
  /* border:1px solid; */
  padding:10px 10px;
}
.left_item{
  display:flex;
  width: 80%;
  height:100%;
  border:1.5px solid #e5e5e5;
  padding:31px 30px;
  /* flex-direction:column; */
  
}
.left_item .item_img{
  padding:1rem 0rem;
  padding-bottom:1rem;
  justify-self:center;
  border:1px solid #e5e5e5;

}
.left_item .item_details{
  margin-top:1rem;
  padding:10px 25px;
}
.left_item .item_details ul li{
  line-height:1.3rem;
  list-style:none;
 
}
.left_item .item_details ul li h6 {
  line-height:2.4rem;
  font-weight:600;
  font-size:1.2rem;
}
.left_item ul li p {
font-size:1rem;
margin-top:-10px;
color:rgb(102, 102, 102);
text-align:justify;
}
.right_item{
display:flex;
  width: 20%;
  height:100%;
  border:1px solid #e5e5e5;
  flex-direction:column;
  padding:20px 10px;
  justify-content:center;
  gap:18px;
  /* align-items:center; */
}
.right_item .item-1{
  display:flex;
  border-bottom:1px solid #e5e5e5;
  /* border:1px solid; */
  padding:5px 5px;
  /* width: 80%; */
}

.right_item .items{
  width: 100%;
  display:flex;
  flex-direction:column;
  /* border:1px solid; */
  padding-left:10px;

}
.right_item .items span{
  font-size:0.8rem;
  margin-bottom:4px;
}
.right_item .items h6{
    vertical-align: top;
    font-size: 16px;
    font-weight: 600;
    line-height: 31px;
    color: #000000;
    font-family: 'Viga', sans-serif;
    text-transform: capitalize
}
.right_item .leftitem i{
  font-size:2.5rem;
  /* color:black; */
  margin-top:2rem;
}
.right_item .leftitem {
  width: 50%;
}
.sub-con .check{
  display:flex;
  justify-content:center;
  align-items:center;
  height:100%;
  border-radius:0.5rem;
  /* background-color: rgba(32,32,32); */
  /* background-color:#d3d3d3; */
  background-color:#006d77;
  color:rgba(255,255,255);
  padding:1rem 1.25rem;
  border:none;
  flex-wrap:wrap;
  margin:0 0 ;
  
}
.check #total{
  color:rgba(145,199,51);
  font-weight:600;
  font-size:1.3rem;
}
.check #sub{
  font-weight:600;
}
.check .btn-check{
  background-color:rgba(204,0,0);
  border:none;
  color:rgba(255,255,255);
  font-weight:600;
  border-radius:0.25rem;
  cursor:pointer;
  font-size:1rem;
  width: 75%;
  margin-left:2.5rem;
  
}
/* view product section end */
</style>