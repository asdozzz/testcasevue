<tr class="salestr-form-item" data-num="<%=num%>">
    <td>
        <select name="type_<%=num%>" class="salestr-form-control salestr-item-type">
            <%for (var key in types){%>
                <option value="<%=types[key]['id']%>" selected="<%=types[key]['id'] == record.type?'selected':''%>"><%=types[key]['text']%></option>
            <%}%>
        </select>
    </td>
    <td>
        <input type="text" class="salestr-form-control salestr-item-selector" name="selector_<%=num%>" value="<%=record.selector%>">
    </td>
    <td>
        <input type="text" class="salestr-form-control salestr-item-val" name="val_<%=num%>" value="<%=record.val%>">
    </td>
    <td>
        <input type="text" class="salestr-form-control salestr-item-val" name="delay_<%=num%>" value="<%=record.delay%>">
    </td>
</tr>