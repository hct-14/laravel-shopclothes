const customSliderContainer = document.querySelector('.custom-slider-container');
const customSliderItems = document.querySelectorAll('.custom-slider-item');
const customPrevButton = document.querySelector('.custom-prev-btn');
const customNextButton = document.querySelector('.custom-next-btn');

let customCurrentIndex = 0;
const customItemWidth = customSliderItems[0].offsetWidth;
const customVisibleItems = 5;

customNextButton.addEventListener('click', () => {
  if (customCurrentIndex < customSliderItems.length - customVisibleItems) {
    customCurrentIndex++;
  } else {
    customCurrentIndex = 0;
  }
  customSliderContainer.style.transform = `translateX(-${customCurrentIndex * customItemWidth}px)`;
});

customPrevButton.addEventListener('click', () => {
  if (customCurrentIndex > 0) {
    customCurrentIndex--;
  } else {
    customCurrentIndex = customSliderItems.length - customVisibleItems;
  }
  customSliderContainer.style.transform = `translateX(-${customCurrentIndex * customItemWidth}px)`;
});
