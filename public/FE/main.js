function setupSlider(sliderElement) {
    const sliderContainer = sliderElement.querySelector('.slider-container');
    const sliderItems = sliderElement.querySelectorAll('.slider-item');
    const prevButton = sliderElement.querySelector('.prev-btn');
    const nextButton = sliderElement.querySelector('.next-btn');

    let currentIndex = 0;
    const itemWidth = sliderItems[0].offsetWidth;
    const visibleItems = 5;

    nextButton.addEventListener('click', () => {
      if (currentIndex < sliderItems.length - visibleItems) {
        currentIndex++;
      } else {
        currentIndex = 0;
      }
      sliderContainer.style.transform = `translateX(-${currentIndex * itemWidth}px)`;
    });

    prevButton.addEventListener('click', () => {
      if (currentIndex > 0) {
        currentIndex--;
      } else {
        currentIndex = sliderItems.length - visibleItems;
      }
      sliderContainer.style.transform = `translateX(-${currentIndex * itemWidth}px)`;
    });
  }

  const sliders = document.querySelectorAll('.slider');
  sliders.forEach(setupSlider);
