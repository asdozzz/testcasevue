<tr class="salestr-form-item" data-num="<%=num%>">
    <td style="width:105px;vertical-align: middle;">
        <div>
            <button class="salestr-btn salestr-btn-secondary salestr-left" data-num="<%=num%>" data-action="remove-item">
                X
            </button>
            <button class="salestr-btn salestr-btn-primary" data-num="<%=num%>" data-action="edit-item">
                Edit
            </button>
        </div>
    </td>
    <td style="vertical-align: middle;">
        <div>
            <%var delay = ''%>
            <%if (record.delay){%>
                 <%delay = ' : delay'+record.delay+'mc'%>
            <%}%>
            <%var sel = ''%>

            <%if (record.type == 'id'){%>
                 <%sel = '#'+record.selector%>
            <%}%>

            <%if (record.type == 'name'){%>
                 <%sel = '[name="'+record.selector+'"]'%>
            <%}%>

            <%=('"'+record.selector+'" : "'+record.val+'"'+delay)%>
        </div>
    </td>

</tr>