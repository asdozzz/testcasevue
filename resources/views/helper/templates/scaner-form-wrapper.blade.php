<div class="salestr-scaner-form" data-num="<%=num%>">
    <h6>Form №<%=num+1%></h6>
    <div class="salestr-form-row">
        <input type="hidden" name="id_<%=num%>" value="<%=record.id%>">
        <div class="salestr-form-group salestr-col-6">
            <label>Name</label>
            <input type="text" class="salestr-form-control" name="name_<%=num%>" value="<%=record.name%>" placeholder="Name">
            <small class="salestr-form-text"></small>
        </div>
        <div class=salestr-form-group  salestr-col-6">
            <label>Domain</label>
            <input type="text" class="salestr-form-control" name="domain_<%=num%>" value="<%=record.domain%>" placeholder="Domain">
            <small class="salestr-form-text"></small>
        </div>
    </div>
    <div class="salestr-scaner-list-fields">
        <table class="salestr-table">

            <tbody>
                 <%=fields%>
            </tbody>
        </table>
    </div>
    <div class="salestr-form-error" data-num="<%=num%>"></div>
    <div class="salestr-scaner-form-actions">
        <button class="salestr-btn salestr-btn-primary salestr-left" data-num="<%=num%>" data-action="save-form">Save</button>
        <button class="salestr-btn salestr-btn-secondary salestr-right" data-num="<%=num%>" data-action="close-form">Close</button>
    </div>
</div>
