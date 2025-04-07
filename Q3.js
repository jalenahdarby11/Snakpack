// DOM Elements
const regionOptions = document.querySelectorAll('.region-option');
const finishButton = document.querySelector('.finish-button');
const emailForm = document.querySelector('.subscription-section');
const emailInput = document.querySelector('.email-input');
const menuIcon = document.querySelector('.menu-icon');
const mainNav = document.querySelector('.main-nav');

// State Management
let selectedRegions = new Set();

// Region Selection Functionality
regionOptions.forEach(option => {
    const checkbox = option.querySelector('.checkbox');
    const regionName = option.querySelector('.region-name').textContent;

    // Click handler
    option.addEventListener('click', () => {
        toggleRegionSelection(option, checkbox, regionName);
    });

    // Keyboard accessibility
    option.addEventListener('keydown', (e) => {
        if (e.key === 'Enter' || e.key === ' ') {
            e.preventDefault();
            toggleRegionSelection(option, checkbox, regionName);
        }
    });
});

// Toggle region selection
function toggleRegionSelection(option, checkbox, regionName) {
    const isSelected = selectedRegions.has(regionName);

    if (isSelected) {
        selectedRegions.delete(regionName);
        checkbox.classList.remove('checked');
        option.setAttribute('aria-checked', 'false');
    } else {
        selectedRegions.add(regionName);
        checkbox.classList.add('checked');
        option.setAttribute('aria-checked', 'true');
    }

    updateFinishButton();
}

// Update Finish Button State
function updateFinishButton() {
    const hasSelections = selectedRegions.size > 0;
    finishButton.disabled = !hasSelections;

    if (hasSelections) {
        finishButton.classList.add('active');
    } else {
        finishButton.classList.remove('active');
    }
}

// Quiz Submission
finishButton.addEventListener('click', handleQuizSubmission);

async function handleQuizSubmission() {
    if (selectedRegions.size === 0) return;

    try {
        finishButton.disabled = true;
        finishButton.textContent = 'Submitting...';

        // Simulate API call
        await new Promise(resolve => setTimeout(resolve, 1000));

        // Show success message
        alert(`Quiz submitted successfully!\nSelected regions: ${Array.from(selectedRegions).join(', ')}`);

        // Reset form
        resetQuiz();
    } catch (error) {
        console.error('Error submitting quiz:', error);
        alert('Failed to submit quiz. Please try again.');
    } finally {
        finishButton.disabled = false;
        finishButton.textContent = 'Finish Quiz';
    }
}

// Reset quiz state
function resetQuiz() {
    selectedRegions.clear();
    regionOptions.forEach(option => {
        const checkbox = option.querySelector('.checkbox');
        checkbox.classList.remove('checked');
        option.setAttribute('aria-checked', 'false');
    });
    updateFinishButton();
}

// Email Subscription
emailForm.addEventListener('submit', handleEmailSubscription);

async function handleEmailSubscription(e) {
    e.preventDefault();
    const email = emailInput.value.trim();

    if (!isValidEmail(email)) {
        showEmailError('Please enter a valid email address');
        return;
    }

    try {
        emailInput.disabled = true;

        // Simulate API call
        await new Promise(resolve => setTimeout(resolve, 1000));

        // Success handling
        emailInput.value = '';
        showEmailSuccess('Thank you for subscribing!');
    } catch (error) {
        console.error('Error subscribing:', error);
        showEmailError('Failed to subscribe. Please try again.');
    } finally {
        emailInput.disabled = false;
    }
}

// Email validation
function isValidEmail(email) {
    return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
}

// Email feedback
function showEmailError(message) {
    emailInput.classList.add('error');
    emailInput.setAttribute('aria-invalid', 'true');
    alert(message); // In production, use a proper toast/notification system
}

function showEmailSuccess(message) {
    emailInput.classList.remove('error');
    emailInput.setAttribute('aria-invalid', 'false');
    alert(message); // In production, use a proper toast/notification system
}

// Mobile Navigation
menuIcon.addEventListener('click', toggleMobileNav);

function toggleMobileNav() {
    const isExpanded = mainNav.classList.toggle('show');
    menuIcon.setAttribute('aria-expanded', isExpanded);
}

// Initialize
document.addEventListener('DOMContentLoaded', () => {
    updateFinishButton();

    // Add aria labels
    menuIcon.setAttribute('aria-label', 'Toggle navigation menu');
    finishButton.setAttribute('aria-label', 'Finish quiz');

    // Add loading="lazy" to images
    document.querySelectorAll('.region-icon').forEach(img => {
        img.setAttribute('loading', 'lazy');
    });
});

// Handle escape key for accessibility
document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && mainNav.classList.contains('show')) {
        toggleMobileNav();
    }
});
