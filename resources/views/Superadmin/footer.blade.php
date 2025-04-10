<style>
  .bg-footer {
    background: linear-gradient(to right, #4A3B2A, #6B4226); /* Softer gradient */
    color: #FFFFFF;
    padding: 2rem 1rem; /* Increased padding */
    box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.1); /* Subtle shadow */
    font-family: "Inter", sans-serif; /* Consistent with dashboard */
  }

  .footer-content {
    max-width: 1200px; /* Constrain width for larger screens */
    margin: 0 auto; /* Center content */
    text-align: center;
  }

  .footer-content p {
    margin: 0.5rem 0; /* Better spacing between lines */
    font-size: 0.95rem; /* Slightly larger for readability */
    font-weight: 300; /* Light weight for elegance */
    opacity: 0.9; /* Subtle transparency */
  }

  .footer-content .highlight {
    font-weight: 500; /* Bolder for emphasis */
    color: #F9E8D9; /* Accent color from dashboard */
    transition: color 0.3s ease;
  }

  .footer-content .highlight:hover {
    color: #FFFFFF; /* Brighten on hover */
    text-decoration: underline; /* Subtle interactivity */
  }

  .footer-divider {
    width: 50px;
    height: 1px;
    background: rgba(255, 255, 255, 0.3);
    margin: 1rem auto; /* Centered divider */
  }

  /* Responsive Adjustments */
  @media (max-width: 768px) {
    .bg-footer {
      padding: 1.5rem 1rem;
    }
    .footer-content p {
      font-size: 0.85rem;
    }
  }
</style>

<!-- Footer -->
<footer class="bg-footer">
  <div class="footer-content">
    <p>© 2025 WalletWise. All rights reserved.</p>
    <div class="footer-divider"></div>
    <p>Guided by <span class="highlight">Pratyush Sharma</span> | Developed at <span class="highlight">Brainerhub</span></p>
  </div>
</footer>