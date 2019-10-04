/*
 |--------------------------------------------------------------------------
 | Social sharing JS
 |--------------------------------------------------------------------------
 |
 | This script adds a click event listener to the social sharing links and
 | opens up a new window for the social link that was clicked
 |
 */

'use strict'
let windowObjectReference = null 
const popupSize = {
  width: 780,
  height: 550
}

let sharingWrapper = document.querySelector('#js-social-media-link')
sharingWrapper.addEventListener('click', openPopup, false)

function openPopup (event) {
  if (windowObjectReference == null || windowObjectReference.closed) {

    if (event.target.parentNode.classList.contains('js-social-media-link')) {

      const verticalPos = Math.floor((window.innerWidth - popupSize.width) / 2)
      const horisontalPos = Math.floor((window.innerHeight - popupSize.height) / 2)

      const windowName = 'Social Sharing'
      const windowOptions = 'width=' + popupSize.width + ',height=' + popupSize.height +
                  ',left=' + verticalPos + ',top=' + horisontalPos +
                  ',scrollbars=1,resizable=1'

      windowObjectReference = window.open(
        event.target.parentNode.getAttribute('href'),
        windowName,
        windowOptions
      )
    }

  } else {
    windowObjectReference.focus()
  }
};
