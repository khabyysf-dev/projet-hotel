// Keep track of user auth state in localStorage
// Updates nav UI when login status changes
class AuthManager {
  constructor() {
    this.user = this.loadUser();
    this.updateUI();
  }

  loadUser() {
    try {
      const stored = localStorage.getItem('user');
      return stored ? JSON.parse(stored) : null;
    } catch (e) {
      return null;
    }
  }

  setUser(user) {
    this.user = user;
    localStorage.setItem('user', JSON.stringify(user));
    this.updateUI();
  }

  isLoggedIn() {
    return !!this.user;
  }

  logout() {
    localStorage.removeItem('user');
    this.user = null;
    this.updateUI();
  }

  updateUI() {
    // Get all the nav elements that change based on auth state
    const userName = document.getElementById('user-name');
    const loginLink = document.getElementById('login-link');
    const registerLink = document.getElementById('register-link');
    const logoutBtn = document.getElementById('logout-btn');
    const reservationsLink = document.getElementById('reservations-link');

    if (this.isLoggedIn()) {
      if (userName) {
        userName.textContent = this.user.name;
        userName.style.display = 'block';
      }
      if (loginLink) loginLink.style.display = 'none';
      if (registerLink) registerLink.style.display = 'none';
      if (logoutBtn) {
        logoutBtn.style.display = 'block';
        logoutBtn.onclick = () => this.handleLogout();
      }
      if (reservationsLink) reservationsLink.style.display = 'block';
    } else {
      if (userName) userName.style.display = 'none';
      if (loginLink) loginLink.style.display = 'block';
      if (registerLink) registerLink.style.display = 'block';
      if (logoutBtn) logoutBtn.style.display = 'none';
      if (reservationsLink) reservationsLink.style.display = 'none';
    }
  }

  handleLogout() {
    this.logout();
    window.location.href = 'index.html';
  }
}

// Initialize auth manager
const authManager = new AuthManager();
