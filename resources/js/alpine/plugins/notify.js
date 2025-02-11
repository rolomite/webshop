export default function (Alpine){
    Alpine.store('alert', {
        notifications: {},

        get typeClass() {
            return {
                success: 'bg-green-500',
                error: 'bg-red-500',
                warning: 'bg-yellow-500',
                info: 'bg-blue-500',
            }[this.type] || 'bg-red-500';
        },

        showAlert(msg, type = 'success', {duration = 3000}) {
            const id = Date.now();
            this.notifications[id] = ({
                id: id,
                message: msg,
                type: type, // success, error, warning, info
                visible: true,
                timeout: duration, // Auto-close after 3 seconds
            })

            this.autoDismiss(id);
        },

        success(message, options = {}){
            this.showAlert(message, 'success', options)
        },

        error(message, options = {}){
            this.showAlert(message, 'error', options)
        },

        warning(message, options = {}){
            this.showAlert(message, 'warning', options)
        },

        info(message, options = {}){
            this.showAlert(message, 'info', options)
        },

        autoDismiss(id) {
            if (this.notifications[id].timeout > 0) {
                setTimeout(() => this.closeAlert(id), this.notifications[id].timeout);
            }
        },

        closeAlert(id) {
            delete this.notifications[id];
        }
    });
}
