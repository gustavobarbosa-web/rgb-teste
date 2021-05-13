const toggleMenu = () => {
  let menu = document.querySelector("header > div > ul");
  menu.classList.toggle("active");
};

const openModal = (src, desc) => {
  let modal = document.querySelector("main > section.galeria .selected");
  let image = document.querySelector("main > section.galeria .selected > img");
  let descricao = document.querySelector(
    "main > section.galeria .selected > p"
  );

  image.src = src;
  if (desc.length >= 3) {
    descricao.innerHTML = desc;
    descricao.style.display = "block";
  } else {
    descricao.style.display = "none";
  }
  modal.classList.add("active");
};

const closeModal = () => {
  let image = document.querySelector("main > section.galeria .selected > img");
  let modal = document.querySelector("main > section.galeria .selected");
  let descricao = document.querySelector(
    "main > section.galeria .selected > p"
  );

  modal.classList.remove("active");
  image.src = "#";
  descricao.innerHTML = "";
};
