import { Controller } from 'stimulus';

export default class extends Controller {
  connect() {
    const toggleShowHide = (el) => el.style.display === 'none' ? el.style.display = '' : el.style.display = 'none';

    const settingsProfileMenu = document.querySelector('.settings-profile-menu');
    const profileButton = document.querySelector('.profile-button');

    profileButton.addEventListener('click', () => toggleShowHide(settingsProfileMenu));
  }
}
