 <!--
              Notification panel, dynamically insert this into the live region when it needs to be displayed

              Entering: "transform ease-out duration-300 transition"
                From: "translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2"
                To: "translate-y-0 opacity-100 sm:translate-x-0"
              Leaving: "transition ease-in duration-100"
                From: "opacity-100"
                To: "opacity-0"
            -->


 const closeNotification = () => {
    const notificationPanel = document.getElementById('notification-panel');
    //hide the notification panel
    notificationPanel.classList.remove('opacity-100');
 }
 console.log('notification.js loaded');
