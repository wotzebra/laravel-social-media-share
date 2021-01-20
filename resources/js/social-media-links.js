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

let sharingWrapper = document.querySelector('#js-social-media-links')
sharingWrapper.addEventListener('click', openPopup, false)

function openPopup (event) {
  if (windowObjectReference == null || windowObjectReference.closed) {
    if (event.target.parentNode.classList.contains('js-social-media-link')) {
      const href = event.target.parentNode.getAttribute('href')

      if (href.startsWith('http')) {
        event.preventDefault()

        const verticalPos = Math.floor((window.innerWidth - popupSize.width) / 2)
        const horisontalPos = Math.floor((window.innerHeight - popupSize.height) / 2)

        const windowName = 'Social Sharing'
        const windowOptions = 'width=' + popupSize.width + ',height=' + popupSize.height +
                    ',left=' + verticalPos + ',top=' + horisontalPos +
                    ',scrollbars=1,resizable=1'

        windowObjectReference = window.open(
          href,
          windowName,
          windowOptions
        )
      }
    }
  } else {
    windowObjectReference.focus()
  }
};

document.querySelector('a.clipboard').addEventListener('click', async event => {
  event.preventDefault()
  var a = event.target.parentElement
  var input = document.body.appendChild(document.createElement("input"));

  try {
    input.value = a.href;
    input.select();
    document.execCommand('copy');
  } catch (error) {
    console.error('Failed to copy!', err)
  }

  input.parentNode.removeChild(input);
})
