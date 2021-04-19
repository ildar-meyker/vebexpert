import $ from 'jquery';

export default {
    methods: {
        validate() {
            this.errors = [];

            const self = this;

            $('[name*="step' + this.stepId +  '"]')
                .filter(':visible')
                .not('[type="file"]')
                .each(function () {

                    if ($(this).val()) {
                        return;
                    }

                    self.errors.push(
                        $(this).data("label") || $(this).attr("placeholder")
                    );
                });

            if (this.errors.length) {
                return false;
            }

            return true;
        },

        triggerInputEvent() {
            $('[name*="step' + this.stepId +'"').each(function () {
                $(this)[0].dispatchEvent(new CustomEvent("input"));
            });
        },

        scrollTop() {
            document.body.scrollTop = 0; // For Safari
	        document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
        },

        next() {
            if (this.validate()) {
                this.$emit("next", this.fields);
            }

            this.scrollTop();
        },

        prev() {
            this.$emit("prev", this.fields);

            this.scrollTop();
        },

        submit($event) {
            if (this.validate()) {
                document.getElementById('app').submit();
                return;
            }

            this.scrollTop();
        }
    }
}