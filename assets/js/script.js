const header = document.querySelector("header");
const main = document.querySelector("main");

window.addEventListener("scroll", function () {
	header.classList.toggle("sticky", window.scrollY > 80);
});

const sr = ScrollReveal({
	distance: "40px",
	duration: 2050,
	delay: 200,
	reset: true,
});

const profile = document.getElementById("profile");
const logout = document.getElementById("logout");
const logout2 = document.getElementById("logout-2");
const MenuMobile = document.getElementById("nav-mobile");
const detail = document.getElementsByClassName("profile-detail")[0];
const modalLogout = document.getElementsByClassName("modal-logout")[0];
const batalLogout = document.getElementsByClassName("batal-logout")[0];
const tMenuMobile = document.getElementsByClassName("user-mobile")[0];
const infoLogin = document.getElementsByClassName("info-login")[0];
const bgFocus = document.getElementsByClassName("bg-focus")[0];
const lanjutPembayaran = document.getElementsByClassName("lanjut-pembayaran")[0];
const alertMessageError = document.getElementsByClassName("alert-message-eror")[0];
const contentButton = document.getElementsByClassName("content-button")[0];
const x = document.getElementById("x-logout");
const x2 = document.getElementById("x2");
const xInfo = document.getElementById("x-info");
// tombol venue
const MenuLapangan = document.getElementById("menu-lapangan");
const MenuAbout = document.getElementById("menu-about");
const MenuRule = document.getElementById("menu-rule");
const MenuGallery = document.getElementById("menu-gallery");
const venueLapangan = document.getElementById("venue-lapangan");
const venueAbout = document.getElementById("venue-about");
const venueRules = document.getElementById("rules");
const venueGallery = document.getElementById("venue-gambar-fasilitas");
const venueJO = document.getElementById("jam-operasional");

const tombolRadio = document.querySelectorAll(".card-radio input[type='radio']").forEach(item =>{
	item.addEventListener('click', function(){
		lanjutPembayaran.classList.add("b-hadir");
	})
});
const tombolRadio2 = document.querySelectorAll(".t-pay").forEach(item =>{
	item.addEventListener('click', function(){
		contentButton.classList.add("b-hadir");
	})
});

if(profile !== null){
	profile.addEventListener("click", function () {
		detail.classList.toggle("hadir");
	});
}

if(tMenuMobile !== null){
	tMenuMobile.addEventListener("click", function () {
		MenuMobile.classList.add("nav-mobile-hadir");
	});
}

if(x2 !== null){
	x2.addEventListener("click", function () {
		MenuMobile.classList.remove("nav-mobile-hadir");
	});
}
if(xInfo !== null){
	xInfo.addEventListener("click", function () {
		infoLogin.classList.add("d-none");
	});
}

if(MenuLapangan !== null){
	MenuLapangan.addEventListener("click", function () {
		venueLapangan.classList.remove("none-venue");
		MenuLapangan.classList.add("hadir-venue-menu");
		venueJO.classList.remove("hadir-venue");
		venueAbout.classList.remove("hadir-venue");
		venueRules.classList.remove("hadir-venue");
		venueGallery.classList.remove("hadir-venue");
		MenuAbout.classList.remove("hadir-venue-menu");
		MenuRule.classList.remove("hadir-venue-menu");
		MenuGallery.classList.remove("hadir-venue-menu");
	});
}

if(MenuAbout !== null){
	MenuAbout.addEventListener("click", function () {
		// ADD
		venueAbout.classList.add("hadir-venue");
		MenuAbout.classList.add("hadir-venue-menu");
		venueJO.classList.add("hadir-venue");
		venueLapangan.classList.add("none-venue");
		// Remove
		MenuLapangan.classList.remove("hadir-venue-menu");
		venueLapangan.classList.remove("hadir-venue");
		venueRules.classList.remove("hadir-venue");
		venueGallery.classList.remove("hadir-venue");
		MenuRule.classList.remove("hadir-venue-menu");
		MenuGallery.classList.remove("hadir-venue-menu");
		MenuLapangan.classList.remove("hadir-venue-menu");
	});
}
if(MenuRule !== null){
	MenuRule.addEventListener("click", function () {
		// ADD
		venueRules.classList.add("hadir-venue");
		MenuRule.classList.add("hadir-venue-menu");
		venueJO.classList.add("hadir-venue");
		venueLapangan.classList.add("none-venue");
		MenuLapangan.classList.remove("hadir-venue-menu");
		// Remove
		MenuAbout.classList.remove("hadir-venue-menu");
		venueAbout.classList.remove("hadir-venue");
		MenuLapangan.classList.remove("hadir-venue-menu");
		venueLapangan.classList.remove("hadir-venue");
		venueGallery.classList.remove("hadir-venue");
		MenuGallery.classList.remove("hadir-venue-menu");
	});
}
if(MenuGallery !== null){
	MenuGallery.addEventListener("click", function () {
		// ADD
		venueGallery.classList.add("hadir-venue");
		MenuGallery.classList.add("hadir-venue-menu");
		venueLapangan.classList.add("none-venue");
		MenuLapangan.classList.remove("hadir-venue-menu");
		// Remove
		venueRules.classList.remove("hadir-venue");
		MenuRule.classList.remove("hadir-venue-menu");
		venueJO.classList.remove("hadir-venue");
		MenuAbout.classList.remove("hadir-venue-menu");
		venueAbout.classList.remove("hadir-venue");
		MenuLapangan.classList.remove("hadir-venue-menu");
		venueLapangan.classList.remove("hadir-venue");
	});
}

main.addEventListener("click", function () {
	modalLogout.classList.remove("logout-hadir");
	MenuMobile.classList.remove("nav-mobile-hadir");
	detail.classList.remove("hadir");
	alertMessageError.classList.add("d-none");
});

if(x !== null){
	x.addEventListener("click", function () {
		modalLogout.classList.remove("logout-hadir");
		bgFocus.classList.remove("d-hadir");
	});
}

if(logout !== null){	
	logout.addEventListener("click", function () {
		modalLogout.classList.add("logout-hadir");
		detail.classList.remove("hadir");
		bgFocus.classList.add("d-hadir");
	});
}

if(logout2 !== null){
	logout2.addEventListener("click", function () {
		modalLogout.classList.add("logout-hadir");
		bgFocus.classList.add("d-hadir");
		MenuMobile.classList.remove("nav-mobile-hadir");
	});
}
if(batalLogout !== null){
	batalLogout.addEventListener("click", function () {
		modalLogout.classList.remove("logout-hadir");
		bgFocus.classList.remove("d-hadir");

	});	
}
if(alertMessageError !== null){
	alertMessageError.addEventListener("click", function () {
		alertMessageError.classList.add("d-none");
	});
}

